<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_produto', function (Blueprint $table) {
            $table->increments('id_produto');

            $table->dateTime('data_cadastro');
            $table->string('nome_produto', 150);
            $table->float('valor_produto', 10, 2);

            $table->unsignedInteger('id_categoria_produto');
            $table->index(['id_categoria_produto'], 'fk_id_categoria_produto');

            $table->foreign('id_categoria_produto', 'fk_id_categoria_produto')
                ->references('id_categoria_planejamento')
                ->on('tb_categoria_produto')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_produto');
    }
}
