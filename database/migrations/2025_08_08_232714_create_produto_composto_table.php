<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutoCompostoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('produto_composto', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nome');
        $table->decimal('preco_venda', 8, 2)->default(0); // Será calculado automaticamente
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_composto');
    }
}
