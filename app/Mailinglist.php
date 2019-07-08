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
        return $this->belongsToMany('App\Recipient', 'mailinglist_recipients', 'recipients_id', 'mailinglists_id');
    }

    public function getMailinglist()
    {
        return $this->belongsToMany('App\Mailinglist', 'mailinglist_recipient', 'mailinglists_id', 'recipient_id')->select(array('mailinglists.id'));
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
