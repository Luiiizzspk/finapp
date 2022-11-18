<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fin_movimento extends Model
{
    use HasFactory;
    protected $fillable = ['descricao', 'valor', 'tipo'];
    //definir relacionamento c/ tabela de usuarios - funcao c/o nome do Model
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    
}
