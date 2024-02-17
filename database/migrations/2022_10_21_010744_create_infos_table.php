<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            
            $table->string('fname')->nullable();
            $table->string('Lname')->nullable();
            $table->string('Mname')->nullable();
            $table->date('bday')->nullable();
            $table->string('placeofBirth')->nullable();
            $table->integer('cnumber')->nullable();
            $table->string('homeAdd')->nullable();
            $table->string('spouseName')->nullable();
            $table->string('occupation')->nullable();
            $table->string('alumniID')->nullable();
            $table->integer('yearGrad')->nullable();
            $table->string('department')->nullable();
            $table->string('course')->nullable();
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('infos');
    }
}
