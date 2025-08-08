<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuantidadeToProdutoSimplesTable extends Migration
{
    public function up()
    {
        Schema::table('produto_simples', function (Blueprint $table) {
            $table->integer('quantidade')
                  ->default(0) 
                  ->after('preco_venda');
        });
    }

    public function down()
    {
        Schema::table('produto_simples', function (Blueprint $table) {
            $table->dropColumn('quantidade');
        });
    }
}