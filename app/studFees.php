<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studFees extends Model
{
    protected $fillable = [
        'studentid', 'term', 'academicyear', 'amt_due', 'amt_rem', 'amt_paid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
