<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoCarritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_carritos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("producto_id")->unsigned();
            $table->integer("carrito_id")->unsigned();

            $table->foreign("producto_id")->references("id")->on("productos")->onDelete('cascade');
            $table->foreign("carrito_id")->references("id")->on("carritos")->onDelete('cascade');
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
        Schema::dropIfExists('productos_carritos');
    }
}
