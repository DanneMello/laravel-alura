<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    public $timestamps = false;
    protected $fillable = ['numero'];

    public function episodios()
    {
        return $this->hasMany(Episodio::class); // Uma temporada tem muitos episódios
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class); // Essa temporada pertence a uma série
    }

    public function getEpisodiosAssistidos(): Collection
    {

        return $this->episodios->filter(function (Episodio $episodio)

        {
            return $episodio->assistido;
        });
    }
}

