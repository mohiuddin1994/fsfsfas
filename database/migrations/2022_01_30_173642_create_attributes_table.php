<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_id")->nullable();
            $table->unsignedBigInteger("size_id")->nullable();
            $table->unsignedBigInteger("color_id")->nullable();
            $table->unsignedBigInteger("stock")->nullable();
            $table->unsignedBigInteger("price")->nullable();
            $table->unsignedBigInteger("statu")->default(1);
                $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
                $table->foreign('size_id')->references('id')->on('sizes')->onDelete('set null');
                $table->foreign('color_id')->references('id')->on('colors')->onDelete('set null');
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
        Schema::dropIfExists('attributes');
    }
}
