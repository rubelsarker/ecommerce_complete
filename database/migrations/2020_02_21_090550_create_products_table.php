<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('p_code');
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('sub_cat_id')->nullable();
            $table->unsignedBigInteger('sub_sub_cat_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('unit')->nullable();
            $table->string('slug');
            $table->text('description')->nullable();
            $table->double('price');
            $table->float('quantity');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('variant')->default(0);
            $table->boolean('discount')->default(0);
            $table->float('discount_percent')->nullable();
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
        Schema::dropIfExists('products');
    }
}
