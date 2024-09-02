<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CadastroVendas extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'situacao',
        'dataEntregaMercadoria',
        'dataRecebimento',
        'observacoes',
        'valorTotal'
    ];

    public function cliente()
    {
        return $this->belongsTo(CadastroCliente::class, 'cliente_id');
    }

    public function produtos()
    {
        return $this->hasMany(CadastroVendaProdutos::class, 'venda_id');
    }
}

