<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class staffSubject extends Model
{
   protected $fillable = [
        'subjectid', 'staffid',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
