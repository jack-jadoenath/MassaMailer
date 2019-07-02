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
        return $this->belongstToMany('App\Recipient', 'mailinglist_recipients', 'mailinglists_id', 'recipients_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
