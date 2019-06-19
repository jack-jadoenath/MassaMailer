<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supportticket extends Model
{
    //
    protected $fillable = [
        'question', 'message'
    ];

    public $timestamps = false;
}
