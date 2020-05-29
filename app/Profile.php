<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getImage()
    {
        if($this->image)
        {
            $imagePath = $this->image;
        }
        else{
            $imagePath = 'avatar/avatar.png';
        }

        dd($imagePath);

        return '/storage/'.$imagePath;
    }
}
