<?php

namespace App\Http\Controllers;


use Intervention\Image\Facades\image;

use Illuminate\Http\Request;

use App\User;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show(User $username)
    {
        return view('profiles.show',compact('username'));
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
            $imagePath = request('image')->store('avatars','public');
            $image->save();

            auth()->$username->profile->update(array_merge(
                $data,
                ['image' => $image]
            ));
       }

        auth()->$username->profile->update($data);

        return  redirect()->route('profiles.show', compact('username'));
    }
}
