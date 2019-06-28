<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mailinglist extends Model
{
    protected $table = 'mailinglists';
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
