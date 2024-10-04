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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100)->nullable(false);
            $table->string('celular',20)->nullable(false);
            $table->string('cpf', 12)->nullable(false)->unique(true);
            $table->string('email',80)->nullable(false)->unique(true);
            $table->date('data_nascimento')->nullable(false);
            $table->string('cidade', 100)->nullable(false);
            $table->string('estado')->nullable(false);
            $table->string('pais')->nullable(false);
            $table->string('rua')->nullable(false);
            $table->string('numero', 4)->nullable(false);
            $table->string('bairro', 100)->nullable(false);
            $table->string('cep', 20)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
