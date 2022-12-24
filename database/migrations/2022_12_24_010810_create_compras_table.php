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
        Schema::create('compras', function (Blueprint $table) {
            $table->id('id_compra');
            $table->foreignId('id_produto')->references('id_produto')
                ->on('produtos')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->integer('quantidade');
            $table->decimal('valor');
            $table->date('data_inicio_pagamento');
            $table->date('data_final_pagamento');
            $table->string('forma_pagamento');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
};
