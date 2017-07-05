<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Guardian extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array*/

    protected $fillable = [
        'firstname', 'surname', 'othername', 'dob', 'gender', 'phone', 'email', 'address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the students for the parent.
     */
    public function students()
    {
        return $this->hasMany('App\Student');
    }
}
