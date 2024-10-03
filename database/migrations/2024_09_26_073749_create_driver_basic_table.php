<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverBasicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_basic', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            
            $table->string('first_name', 255);
            $table->string('last_name', 255);

            $table->string('email', 255);
            $table->string('phone', 20);

            $table->string('street', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('postal_code', 255)->nullable();

            $table->string('latitude', 255)->nullable();
            $table->string('longitude', 255)->nullable();

            $table->string('bank_name', 255)->nullable();
            $table->string('bank_account_number', 255)->nullable();

            $table->string('license', 255)->nullable();
            $table->string('vehicle_type', 255)->nullable();
            $table->string('model', 255)->nullable();
            $table->string('registration_number', 255)->nullable();

            $table->string('image', 255)->nullable();

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
        Schema::dropIfExists('driver_basic');
    }
}
