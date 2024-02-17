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
            $table->string('prod_code');
            $table->bigInteger('cate_id');
            $table->string('name');
            $table->string('slug');
            $table->mediumText('small_description');
            $table->string('description');
            $table->string('orig_price');
            $table->string('selling_price');
            $table->string('image');
            $table->string('quantity');
            $table->integer('tax');
            $table->tinyInteger('status');
            $table->tinyInteger('trending');
            $table->mediumText('meta_title')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->mediumText('meta_keywords')->nullable();
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
