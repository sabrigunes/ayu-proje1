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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('comment', 255);
            $table->string('rate', 255);
            $table->foreignId('car_id');
            $table->foreignId('user_id');
            $table->string('ip', 255);
            $table->enum('status', ['-1','0','1']);
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
