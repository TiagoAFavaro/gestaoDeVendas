<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cadastro_vendas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('cadastro_clientes')->onDelete('cascade');
            $table->string('situacao');
            $table->date('dataEntregaMercadoria');
            $table->date('dataRecebimento');
            $table->string('observacoes')->nullable();
            $table->double('valorTotal', 10, 2);
            $table->timestamps();
        });

        Schema::create('cadastro_venda_produtos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venda_id')->constrained('cadastro_vendas')->onDelete('cascade');
            $table->foreignId('produto_id')->constrained('cadastro_produtos')->onDelete('cascade');
            $table->string('detalhes')->nullable();
            $table->integer('quantidade');
            $table->double('valor', 10, 2);
            $table->double('subtotal', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cadastro_venda_produtos');
        Schema::dropIfExists('cadastro_vendas');
    }
};
