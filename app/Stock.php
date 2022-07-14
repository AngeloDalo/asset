<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'user_id',
        'codice',
        'nome',
        'ammontare',
        'prezzo_singolo',
        'immagine',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
