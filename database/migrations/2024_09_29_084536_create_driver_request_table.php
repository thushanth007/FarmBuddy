<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_request', function (Blueprint $table) {
            $table->increments('id');

            $table->string('driver_reference', 255);
            
            $table->unsignedInteger('order_id');
            $table->foreign('order_id')->references('id')->on('order')->onDelete('cascade');

            $table->unsignedInteger('driver_id')->nullable();
            $table->foreign('driver_id')->references('id')->on('admins')->onDelete('cascade');

            $table->boolean('is_status')->default(false);
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
        Schema::dropIfExists('driver_request');
    }
}
