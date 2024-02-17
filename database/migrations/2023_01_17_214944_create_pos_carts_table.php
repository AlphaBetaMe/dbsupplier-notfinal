<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos_carts', function (Blueprint $table) {
            $table->id();
            $table->string('prod_code')->nullabe();
            $table->integer('prod_qty')->default(1);
            $table->integer('product_price')->default(0);
            $table->integer('user_id')->nullabe();
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
        Schema::dropIfExists('pos_carts');
    }
}
