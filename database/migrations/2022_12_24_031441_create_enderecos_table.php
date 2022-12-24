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
        Schema::create('enderecos', function (Blueprint $table) {

            $table->foreignId('id_cliente')
                ->primary()
                ->references('id_cliente')
                ->on('clientes')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->string('rua');
            $table->integer('numero');
            $table->string('cidade');
            $table->string('logradouro');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
};
