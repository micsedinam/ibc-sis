<?php

namespace App;

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
        'firstname', 'surname', 'othername', 'dob', 'gender', 'phone', 'email', 'address', 'programme', 'class', 'studentid',
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
     * Get the parent that owns the student.
     */
    public function guardians()
    {
        return $this->belongsTo('App\Guardian');
    }

    /**
     * The subjects that belong to the student.
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
