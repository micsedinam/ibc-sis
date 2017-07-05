<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectsElectives extends Model
{
    protected $fillable = [
        'subjectid', 'subject_title', 'programme', 'class'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
