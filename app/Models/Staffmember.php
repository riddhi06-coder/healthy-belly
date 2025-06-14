<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staffmember extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    
        protected $guard = 'staffmember';
    
        protected $fillable = [
            'first_name','last_name' , 'email', 'password',
        ];
    
        protected $hidden = [
            'password', 'remember_token',
        ];
}
