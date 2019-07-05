<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    //
    public $timestamps = false;

    public function mail()
    {
        $this->belongsTo('App\Mail');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
