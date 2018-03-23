<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->string('link')->nullable();
            $table->unsignedInteger('ordinal')->default(1);
            $table->unsignedTinyInteger('is_show')->default(1);
            $table->unsignedTinyInteger('is_main')->default(0)->comment('1: show in home');
            $table->unsignedInteger('category_id');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_banners');
    }
}
