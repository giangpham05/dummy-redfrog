<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getId()
    {
        return $this->id;
    }

    public function isAdmin()
    {
        return $this->role == 1;
    }

    public function isTherapist()
    {
        return $this->role == 2;
    }

    public function getUsername()
    {
        $email = $this->email;
        $paths = explode('@',$email);
        return $paths[0];
    }
    public function surveys()
    {
        return $this->hasMany('App\Models\Survey');

    }

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }
}
