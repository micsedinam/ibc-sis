<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array*/

    protected $fillable = [
        'firstname', 'surname', 'othername', 'dob', 'gender', 'phone', 'email', 'address', 'qualification', 'staffid',
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
     * The subjects that belong to the teacher.
     */
    public function subjects()
    {
        return $this->belongsToMany('App\Subject');
    }

    public function forumposts()
    {
        return $this->hasMany('App\Forumpost');
    }
}
