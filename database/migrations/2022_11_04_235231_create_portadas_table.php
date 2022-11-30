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
        Schema::create('portadas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_id')->unique();
            $table->foreign('producto_id')
                  ->references('id')
                  ->on('productos')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('imagen_id')->unique();
            $table->foreign('imagen_id')
                    ->references('id')
                    ->on('imagenes')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('portadas');
    }
};
