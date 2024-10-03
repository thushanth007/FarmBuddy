<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');

            $table->string('order_reference', 255);
            
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedInteger('farmer_id');
            $table->foreign('farmer_id')->references('id')->on('admins')->onDelete('cascade');

            $table->unsignedInteger('driver_id')->nullable();
            $table->foreign('driver_id')->references('id')->on('admins')->onDelete('cascade');

            $table->decimal('total', 8, 2)->nullable();
            $table->decimal('driver', 8, 2)->nullable();
            $table->decimal('driver_payment', 8, 2)->nullable();
            
            $table->string('delivery_option', 255)->nullable();
            $table->boolean('order_placed')->default(false);
            $table->boolean('order_confirmed')->default(false);
            $table->boolean('driver_picked_up')->default(false);
            $table->boolean('delivered')->default(false);

            $table->string('payment_option', 255)->nullable();
            $table->string('paypal_id', 255)->nullable();
            $table->string('paypal_intent', 255)->nullable();
            $table->string('paypal_status', 255)->nullable();

            $table->boolean('farmer_payment_status')->default(false);
            $table->boolean('driver_payment_status')->default(false);

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
        Schema::dropIfExists('order');
    }
}
