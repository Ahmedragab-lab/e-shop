<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cats', function (Blueprint $table) {
            $table->id();
            $table->string('cat_name');
            $table->string('slug');
            $table->longtext('desc');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('popular')->default(0);
            $table->string('image')->default('default.jpg');
            $table->string('meta_title');
            $table->string('meta_disc');
            $table->string('meta_keywords');
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
        Schema::dropIfExists('cats');
    }
}
