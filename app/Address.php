<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'coin_id',
        'indirizzo',
        'portafoglio',
        'immagine',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function coin()
    {
        return $this->belongsTo('App\Coin');
    }
}
