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
        Schema::create('parcela_compras', function (Blueprint $table) {

            $table->id('id_parcela');
            $table->foreignId('id_compra')
                ->references('id_compra')
                ->on('compras')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->boolean('pago')->default(false);
            $table->decimal('valor');
            $table->date('data_pagamento');
            $table->date('data_vencimento');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parcela_compras');
    }
};
