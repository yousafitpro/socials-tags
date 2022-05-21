<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class message extends Model
{
    use HasFactory,SoftDeletes;
    public function __construct()
    {
        if(Auth::check())
        {
            $this->user_id=Auth::user()->id;
        }

    }
    public function official()
    {
        return $this->belongsTo(official::class,'official_id', 'id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'role_id','id');
    }
}
