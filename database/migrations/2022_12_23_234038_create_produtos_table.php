<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {

            $table->id('id_produto');
            $table->string('nome');
            $table->string('tipo');
            $table->string('marca');
            $table->integer('quantidade')->default(0);
            $table->decimal('valor_venda');
            $table->string('modelo');
            $table->string('categoria');
            $table->string('descrição');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
};
