<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mailinglist extends Model
{

    public $timestamps = false;

    protected $fillable = ['name'];

    protected $table = 'mailinglists';

    public function recipient()
    {
        return $this->belongstToMany('App\Recipient');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
