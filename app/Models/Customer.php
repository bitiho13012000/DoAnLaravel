<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Autheticatable;
use Illuminate\Notifications\Notifiable;



class Customer extends Authenticate
{

    use Notifiable;

    protected $table = 'customer';

    protected $fillable = ['name','email','password','phone','address'];

    protected $hidden = ['password'];
}
