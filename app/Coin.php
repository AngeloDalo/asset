<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    protected $fillable = [
        'user_id',
        'codice',
        'ammontare',
        'prezzo_singolo',
        'apy',
        'immagine',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function addresses()
    {
        return $this->hasMany('App\Address');
    }
}
