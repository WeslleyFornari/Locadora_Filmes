<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;

    protected $fillable = ['capa','titulo','genero', 'resumo', 'status'];

    protected $enumStatus = ['alugar', 'indisponivel'];

    public function getStatusFilme($value)
    {
        return $this->enumStatus[$value];
    }

    public function locacao(){

        return $this->hasMany(Locacao::class,'id_filme', 'id');
    }


}
