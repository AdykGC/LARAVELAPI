<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

#   class WebAdmin extends Model {
#       use HasFactory;
#   }

class WebAdmin extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'full_name',
        'username',
        'password',
        'email',
        'phone',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}