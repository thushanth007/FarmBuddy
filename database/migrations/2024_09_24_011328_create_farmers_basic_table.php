<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmersBasicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmers_basic', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            
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

            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');

            $table->string('bank_name', 255)->nullable();
            $table->string('bank_account_number', 255)->nullable();

            $table->string('logo', 255)->nullable();
            $table->string('document', 255)->nullable();

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
        Schema::dropIfExists('farmers_basic');
    }
}
