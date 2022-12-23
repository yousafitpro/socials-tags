<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable=['user_id','is_two_step_enabled','is_phone_verified'];

}
