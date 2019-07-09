<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function isAdmin()
    {
        return $this->admin;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'card_last_four', 'packages_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function mailinglist()
    {
        return $this->hasMany('App\Mailinglist');
    }

    public function supportticket()
    {
        return $this->hasMany('App\Supportticket');
    }

    public function template()
    {
        return $this->hasMany('App\Template');
    }

    public function mail()
    {
        return $this->hasMany('App\Mail');
    }
}
