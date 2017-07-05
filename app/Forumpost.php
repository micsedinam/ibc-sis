<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forumpost extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function staff()
    {
    	return $this->belongsTo('App\Staff');
    }

    public function admin()
    {
    	return $this->belongsTo('App\Admin');
    }
}
