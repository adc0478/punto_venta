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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->double('cantidad');
            $table->unsignedBigInteger('remitos_id')->foreign('remitos_id')->references('id')->on('remitos')->ondelete('cascade'); 
            $table->unsignedBigInteger('productos_id')->foreign('productos_id')->references('id')->on('productos')->ondelete('cascade'); 
            $table->unsignedBigInteger('productos_unidades_id')->foreign('productos_unidades_id')->references('id_unidad')->on('productos'); 
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
        Schema::dropIfExists('ventas');
    }
};
