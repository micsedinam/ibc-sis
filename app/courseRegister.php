<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class courseRegister extends Model
{
    protected $fillable = [
        'semester', 'level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function user()
    {
        return $this->hasMany('App\User');
    }
}
