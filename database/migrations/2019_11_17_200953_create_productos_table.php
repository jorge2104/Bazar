<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('descripcion');
            $table->float('precio_propuesto');
            $table->float('precio_vendido');
            $table->integer('consignado');
            $table->integer('clienta_vende');
            $table->integer('area');
            $table->integer('disponibles');
            $table->timestamps();
            $table->foreign('clienta_vende')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('area')->references('id')->on('areas')->onDelete('cascade');
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
}
