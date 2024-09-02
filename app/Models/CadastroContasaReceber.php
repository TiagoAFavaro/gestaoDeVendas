<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CadastroContasaReceber extends Model
{
    use HasFactory;

    protected $table = 'contas_a_receber';

    protected $fillable = [
        'descricaoRecebimento',
        'formaRecebimento',
        'pagamentoRecebido',
        'vencimento',
        'contaBancaria',
        'valorBruto',
        'juros',
        'desconto',
        'valorTotal',
    ];
}
