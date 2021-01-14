<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\image;
use Illuminate\Support\Facades\Cache;


class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(User $username)
    {

        $postsCount = Cache::remember('posts.count'. $username->id,now()->addSeconds(30) ,function () use ($username) {
            return $username->posts->count();
        });

        $followersCount = Cache::remember('followers.count'. $username->id,now()->addSeconds(30), function () use ($username) {
            return $username->profile->followers->count();
        });

        $followingCount = Cache::remember('following.count'. $username->id,now()->addSeconds(30), function () use ($username) {
            return  $username->following->count();
        });

        return view('profiles.show',compact('username','postsCount','followersCount','followingCount'));
    }


    public function edit(User $username)
    {
        $this->authorize('update',$username->profile);

        return view('profiles.edit',compact('username'));
    }


    public function update(User $username)
    {
        $this->authorize('update',$username->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' =>'required',
            'url' =>'required|url',
            'image' => 'sometimes|image|max:3000'
        ]);

       if (request('image')) {
            $imagePath = request('image')->store('public/avatars');
            $image = Image::make(public_path('/storage/{$imagePath}'))->fit(800,800);
            $image->save();

            auth()->user()->profile()->update(array_merge(
                $data,
                ['image' => $image]
            ));
       }

        auth()->user()->profile()->update($data);

        return  redirect()->route('profiles.show', compact('username'));
    }
}
