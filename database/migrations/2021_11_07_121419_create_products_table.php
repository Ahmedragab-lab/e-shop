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
            $table->foreignId('cat_id')->references('id')->on('cats')->CascadeOnDelete();
            $table->string('product_name');
            $table->string('slug');
            $table->mediumText('small_desc');
            $table->longText('desc');
            $table->string('original_price');
            $table->string('selling_price');
            $table->string('image')->default('default.jpg');
            $table->string('qty');
            $table->string('tax');
            $table->tinyInteger('status')->default('0');
            $table->tinyInteger('trending')->default('0');
            $table->mediumText('meta_title')->nullable();
            $table->mediumText('meta_desc')->nullable();
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
