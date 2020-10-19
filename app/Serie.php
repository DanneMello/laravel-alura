<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

# Classe Serie herda da classe Model do Eloquent
class Serie extends Model
{
    public $timestamps = false; # Não será salvo as informações de tempo no banco
    protected $fillable = ['nome',];

    public function temporadas() // Método responsável por relacionar série com temporada
    {
        return $this->hasMany(Temporada::class) ; # Informando o PHP que uma série tem muitas temporadas
    }
}
