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
        Schema::create('trabalha_em', function (Blueprint $table) {
            $table->foreignId('id_transportadora')
                ->references('id_transportadora')
                ->on('transportadoras')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('id_entregador')
                ->references('id_entregador')
                ->on('entregadores')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
