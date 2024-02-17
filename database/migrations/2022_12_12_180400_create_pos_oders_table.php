<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosOdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos_oders', function (Blueprint $table) {
            $table->id();
            $table->string('prod_id');
            $table->string('posQuantity');
            $table->string('posPrice');
            $table->string('posDiscount');
            $table->string('posTotal_amount');
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
        Schema::dropIfExists('pos_oders');
    }
}
