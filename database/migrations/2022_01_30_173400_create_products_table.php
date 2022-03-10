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
            $table->id();
            $table->string("name")->nullable();
            $table->string("title")->nullable();
            $table->string("sku")->nullable();
            $table->string("image")->nullable();
            $table->text("description")->nullable();
            $table->unsignedBigInteger("price")->nullable();
            $table->unsignedBigInteger("stock")->nullable();
            $table->unsignedBigInteger("discount")->nullable();
            $table->unsignedBigInteger("category_id")->nullable();
            $table->unsignedBigInteger("subcategory_id")->nullable();
            $table->unsignedBigInteger("brand_id")->nullable();
            $table->unsignedBigInteger("statu")->default(1);
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
