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
        Schema::create('entregas', function (Blueprint $table) {
            $table->foreignId('id_venda');
            $table->foreignId('id_transportadora')->references('id_transportadora')->on('transportadoras');
            $table->integer('codigo')->autoIncrement()->unique();
            $table->decimal('valor_frete');
            $table->date('data_entrega_prevista');
            $table->boolean('entregue');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entregas');
    }
};
