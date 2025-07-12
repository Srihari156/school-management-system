<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Logins extends Authenticatable
{
    protected $fillable = ['username', 'password', 'role'];
    
  
}