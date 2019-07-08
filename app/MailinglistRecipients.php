<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailinglistRecipients extends Model
{
    protected $table = 'mailinglist_recipients';
    public $timestamps = false;
    public $incrementing = true;
}
