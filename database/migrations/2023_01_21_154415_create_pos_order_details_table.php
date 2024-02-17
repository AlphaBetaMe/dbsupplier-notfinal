<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos_order_details', function (Blueprint $table) {
            $table->id();
            $table->string('posOrder_id')->nullable();
            $table->string('product_id')->nullable();
            $table->string('posQuantity')->nullable();
            $table->string('posPrice')->nullable();
            $table->string('posDiscount')->nullable();
            $table->string('posTotal_amount')->nullable();
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
        Schema::dropIfExists('pos_order_details');
    }
}
