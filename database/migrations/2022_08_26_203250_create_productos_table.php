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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->double('precio');
            $table->double('stock',5);
            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_categoria')
                ->references('id')
                ->on('categorias');
            $table->unsignedBigInteger('id_unidad');
            $table->foreign('id_unidad')
                    ->references('id')
                    ->on('unidades');
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
        Schema::dropIfExists('productos');
    }
};
