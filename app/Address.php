<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'coin_id',
        'indirizzo',
        'portafoglio',
        'immagine',
        'created_at',
        'updated_at',
    ];

    public function coin()
    {
        return $this->belongsTo('App\Coin');
    }
}
