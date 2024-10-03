<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');

            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
            
            $table->string('name', 255);
            $table->string('section', 255)->nullable();
            $table->mediumText('information')->nullable();
            $table->longText('description')->nullable();
            $table->longText('additional_info')->nullable();
            $table->longText('care_instructions')->nullable();

            $table->string('unit', 255)->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->integer('stock')->nullable();
            $table->integer('sold')->nullable();
            $table->decimal('offer', 5, 2)->nullable();

            $table->string('type', 255)->nullable();
            $table->string('sku', 255)->nullable();

            $table->string('image_1', 255)->nullable();
            $table->string('image_2', 255)->nullable();
            $table->string('image_3', 255)->nullable();
            $table->string('image_4', 255)->nullable();

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
        Schema::dropIfExists('product');
    }
}
