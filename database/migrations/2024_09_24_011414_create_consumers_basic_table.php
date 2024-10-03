<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumersBasicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumers_basic', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->string('farm_name', 255);
            $table->string('first_name', 255);
            $table->string('last_name', 255);

            $table->string('email', 255);
            $table->string('phone', 20);

            $table->string('street', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('postal_code', 255)->nullable();

            $table->string('latitude', 255)->nullable();
            $table->string('longitude', 255)->nullable();

            $table->string('payment_type', 255)->nullable();

            $table->string('picture', 255)->nullable();

            $table->boolean('view')->default(false);
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
        Schema::dropIfExists('consumers_basic');
    }
}
