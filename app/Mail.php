<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{

    public $timestamps = false;

    protected $table = 'mails';

    protected $fillable = ['name', 'message', 'templates_id'];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function template()
    {
        return $this->hasOne('App\Template');
    }

    public function mailinglist()
    {
        return $this->hasOneThrough('App\Malinglist', 'App\User');
    }
}
