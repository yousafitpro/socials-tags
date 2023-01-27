<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class post extends Model
{
    public function __construct()
    {
        if(Auth::check())
        {
            $this->user_id=Auth::user()->id;
        }

    }
    public function user()
    {
        return $this->belongsTo(User::class,);
    }
    public function image_url()
    {
        return asset($this->image);
    }
}
