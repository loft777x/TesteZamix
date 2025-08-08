<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutoCompostoItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('produto_composto_itens', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('produto_composto_id');
        $table->unsignedInteger('produto_simples_id');
        
        // Remova esta linha se não quiser timestamps:
        // $table->timestamps();
        
        // Mantenha as chaves estrangeiras
        $table->foreign('produto_composto_id')->references('id')->on('produto_composto')->onDelete('cascade');
        $table->foreign('produto_simples_id')->references('id')->on('produto_simples')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_composto_itens');
    }
}
