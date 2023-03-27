<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_category_id');
            $table->unsignedBigInteger('car_model_id');
            $table->unsignedBigInteger('car_model_model_id');
            $table->unsignedBigInteger('category_id');
            $table->string('name')->nullable();
            $table->string('count1')->nullable();
            $table->string('count2')->nullable();
            $table->string('source')->nullable();
            $table->string('price1')->nullable();
            $table->string('price2')->nullable();
            $table->string('img')->nullable();
            $table->string('oem')->nullable();
            $table->string('from_year')->nullable();
            $table->string('to_year')->nullable();
            $table->timestamps();

            $table->foreign('car_category_id')->references('id')->on('car_categories')->onDelete('cascade');
            $table->foreign('car_model_id')->references('id')->on('car_models')->onDelete('cascade');
            $table->foreign('car_model_model_id')->references('id')->on('car_model_models')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
