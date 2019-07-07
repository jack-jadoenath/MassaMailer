<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    public $timestamps = false;

    protected $table = 'recipients';

    protected $fillable = ['email', 'firstname', 'lastname'];

    public function mailinglist()
    {
        return $this->belongsToMany('App\Mailinglist', 'mailinglist_recipients', 'mailinglists_id', 'recipients_id');
    }

    public function getRecipient()
    {
        return $this->belongsToMany('App\User', 'mailinglist_recipient', 'recipient_id', 'mailinglists_id')->select(array('recipient.id'));
    }
}
