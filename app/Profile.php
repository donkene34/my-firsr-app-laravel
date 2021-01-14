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

    public function followers()
    {
        return $this->belongsToMany('App\user');
    }

    public function getImage()
    {
        if($this->image)
        {
            $imagePath = $this->image;
        }
        else{
            $imagePath ='/storage/'.'avatar/avatar.png';
        }

        return '/storage/'.$imagePath;
    }
}
