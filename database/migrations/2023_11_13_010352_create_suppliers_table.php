<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('application')->nullable();
            $table->string('buspermit')->nullable();
            $table->string('dticert')->nullable();
            $table->string('birpermit')->nullable();
            $table->string('mpermit')->nullable();
            $table->string('bcert')->nullable();
            $table->string('valid')->nullable();
            $table->string('pic')->nullable();
            $table->string('user_id');
            $table->string('membership');
            $table->string('payment');
            $table->string('status');
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
        Schema::dropIfExists('suppliers');
    }
}
