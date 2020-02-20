<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('producto_id');
            $table->dateTime('fecha');
            $table->integer('pago');
            $table->integer('quien_vendio');
            $table->float('precio_venta');
            $table->integer('comprador');
            $table->timestamps();
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('quien_vendio')->references('id')->on('users');
            $table->foreign('comprador')->references('id')->on('users');
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
}
