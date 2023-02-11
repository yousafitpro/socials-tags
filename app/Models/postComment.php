<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postComment extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function post()
    {
        return $this->belongsTo(post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
