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
        Schema::create('cadastro_produtos', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->string('fornecedor');
            $table->double('precoCusto', 8,2);
            $table->double('precoVenda', 8,2);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadastro_produtos');
    }
};
