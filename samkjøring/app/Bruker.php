<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Bruker extends Authenticatable
{
    use Notifiable;

    protected $table = 'bruker';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fornavn','epost','passord'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // Tillegg vi kan legge til seinere - konto_aktiv, dato_aktivert, dato_deaktivert
        'passord', 'remember_token',
    ];


    public function getAuthPassword()
    {
      return $this->passord;
    }
}
