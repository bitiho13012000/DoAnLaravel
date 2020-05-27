<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Customer as Authenticatable;



class Customer extends Authenticate
{

    use Notifiable;

    protected $table = 'customer';

    protected $fillable = ['name','email','password','phone','address'];

    protected $hidden = ['password'];
}
