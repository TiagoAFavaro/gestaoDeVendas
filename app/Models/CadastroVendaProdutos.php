<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CadastroVendaProdutos extends Model
{
    use HasFactory;

    protected $fillable = [
        'venda_id',
        'produto_id',
        'detalhes',
        'quantidade',
        'valor',
        'subtotal'
    ];

    public function produto()
    {
        return $this->belongsTo(CadastroProdutos::class, 'produto_id');
    }
}
