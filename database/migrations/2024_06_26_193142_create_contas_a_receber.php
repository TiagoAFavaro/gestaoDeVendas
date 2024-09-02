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
        Schema::create('contas_a_receber', function (Blueprint $table) {
            $table->id();
            $table->string('descricaoRecebimento');
            $table->string('formaRecebimento');
            $table->string('pagamentoRecebido');
            $table->string('vencimento');
            $table->string('contaBancaria');
            $table->string('valorBruto');
            $table->string('juros');
            $table->string('desconto');
            $table->string('valorTotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contas_a_receber');
    }
};
