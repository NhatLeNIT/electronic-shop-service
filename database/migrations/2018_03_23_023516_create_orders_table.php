<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 20);
            $table->string('receiver_name');
            $table->string('receiver_phone');
            $table->text('receiver_address');
            $table->text('note');
            $table->unsignedTinyInteger('status')->default(1)
                ->comment('Order status: 0: cancel order, 1: new order, 2: confirmed order, 3: being delivered: 4: delivered');
            $table->unsignedTinyInteger('is_paid')->default(0);
            $table->unsignedInteger('payment_method_id');
            $table->unsignedInteger('delivery_method_id');
            $table->unsignedInteger('customer_id')->nullable();
            $table->timestamps();
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('delivery_method_id')->references('id')->on('delivery_methods')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')
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
        Schema::dropIfExists('orders');
    }
}
