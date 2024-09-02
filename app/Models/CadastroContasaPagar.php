<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CadastroContasaPagar extends Model
{
    use HasFactory;

    protected $table = 'contas_a_pagar';

    protected $fillable = [
        'descricaoPagamento',
        'formaPagamento',
        'pagamentoQuitado',
        'vencimento',
        'contaBancaria',
        'valorBruto',
        'juros',
        'desconto',
        'valorTotal',
    ];
}
