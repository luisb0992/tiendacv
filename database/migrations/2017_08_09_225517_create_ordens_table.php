<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("carrito_id")->unsigned();
            $table->string("line1");
            $table->string("line2")->nullable(true);
            $table->string("city");
            $table->string("postal_code");
            $table->string("country_code");
            $table->string("state");
            $table->string("recipient_name");
            $table->string("email");
            $table->string("status")->default("creado");
            $table->string("guide_number")->nullable(true);
            $table->integer("total");
            
            $table->foreign("carrito_id")->references("id")->on("carritos");
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
        Schema::dropIfExists('ordenes');
    }
}
