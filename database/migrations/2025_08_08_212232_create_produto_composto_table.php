<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutoCompostoTable extends Migration
{
    public function up()
    {
        Schema::create('produto_composto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->decimal('preco_venda', 10, 2)->default(0.00); // Adicionei default
            $table->timestamps();
        });

        Schema::create('produto_composto_itens', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('produto_composto_id');
            $table->unsignedInteger('produto_simples_id');
            $table->timestamps();

            $table->foreign('produto_composto_id')
                  ->references('id')->on('produto_composto')
                  ->onDelete('cascade');
                  
            $table->foreign('produto_simples_id')
                  ->references('id')->on('produto_simples')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('produto_composto_itens');
        Schema::dropIfExists('produto_composto');
    }
}