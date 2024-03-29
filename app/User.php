<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function coins()
    {
        return $this->hasMany('App\Coin');
    }

    public function stocks()
    {
        return $this->hasMany('App\Stock');
    }

    public function money()
    {
        return $this->hasMany('App\Money');
    }

    public function addresses()
    {
        return $this->hasMany('App\Address');
    }

    public function transaction()
    {
        return $this->hasMany('App\Transaction');
    }

    public function trend()
    {
        return $this->hasMany('App\Trend');
    }
}
