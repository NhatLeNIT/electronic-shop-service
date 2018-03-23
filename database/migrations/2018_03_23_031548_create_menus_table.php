<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug', 150)->unique();
            $table->string('icon')->nullable();
            $table->string('link');
            $table->unsignedInteger('ordinal')->default(1);
            $table->unsignedTinyInteger('is_show')->default(1);
            $table->unsignedInteger('parent_id')->default(0);
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('menus')
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
        Schema::dropIfExists('menus');
    }
}
