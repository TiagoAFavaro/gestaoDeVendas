<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CadastroFornecedores extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cnpj',
        'endereco',
        'numero',
        'cidade',
        'estado',
        'cep',
        'contato',
        'telefone',
        'email',
    ];
}