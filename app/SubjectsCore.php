<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectsCore extends Model
{
    protected $fillable = [
        'subjectid', 'subject_title',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
