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
        return $this->belongsTo('App\Mailinglist', 'mailinglists_recipients', 'mailinglists_id', 'recipients_id');
    }
}
