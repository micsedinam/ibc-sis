<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
     protected $fillable = [
        'studentid', 'subject_title', 'academicyear', 'term', 'ca_score', 'exam_score', 'total', 'grade',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
