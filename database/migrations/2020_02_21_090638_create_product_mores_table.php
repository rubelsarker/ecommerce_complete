<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductMoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_mores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('p_id');
            $table->string('key');
            $table->string('value');
            $table->foreign('p_id')
                ->references('id')->on('products')
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
        Schema::dropIfExists('product_mores');
    }
}
