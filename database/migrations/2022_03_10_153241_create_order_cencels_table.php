<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderCencelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_cencels', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->integer("order_id");
            $table->string("apllie_date")->nullable();
            $table->string("statu")->nullable();
            $table->string("statu_date")->nullable();
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
        Schema::dropIfExists('order_cencels');
    }
}
