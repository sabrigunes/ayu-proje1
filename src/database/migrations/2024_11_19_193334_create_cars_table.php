<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('keywords', 255);
            $table->text('description');
            $table->string('image');
            $table->foreignId('category_id');
            $table->text('detail');
            $table->foreignId('brand_id');
            //////////////////////////////////////////
            $table->string('city', 255);
            $table->string('district', 255);
            $table->string('neighborhood', 255);
            $table->smallInteger('year');
            $table->string('fuel_type', 255);
            $table->string('transmission', 255);
            $table->string('kilometers', 255);
            $table->string('body_type', 255);
            $table->string('engine_power', 255);
            $table->string('engine_size', 255);
            $table->string('drivetrain', 255);
            $table->string('color', 255);
            $table->string('seating_capacity', 255);
            $table->string('number_of_seats', 255);
            $table->string('avg_fuel_consumption', 255);
            //////////////////////////////////////////
            $table->foreignId('user_id');
            $table->enum('status', ['-1','0','1']);
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
