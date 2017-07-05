<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
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
}
