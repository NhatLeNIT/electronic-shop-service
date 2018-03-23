<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('code', 20)->unique();
            $table->string('name');
            $table->unsignedInteger('price');
            $table->string('thumbnail');
            $table->text('description')->nullable();
            $table->string('slug', 150)->unique();
            $table->unsignedInteger('view')->default(0);
            $table->unsignedInteger('sold')->default(0);
            $table->unsignedTinyInteger('is_show')->default(1);
            $table->string('seo_title')->nullable();
            $table->string('seo_keyword')->nullable();
            $table->string('seo_description')->nullable();
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('category_id');
            $table->timestamps();
            $table->foreign('brand_id')->references('id')->on('brands')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
