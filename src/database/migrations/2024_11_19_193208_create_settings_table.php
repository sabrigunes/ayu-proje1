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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('keywords', 255);
            $table->string('description', 255);
            $table->string('company', 255);
            $table->string('address', 255);
            $table->string('phone', 255);
            $table->string('fax', 255);
            $table->string('email', 255);
            $table->string('smtp_server', 255);
            $table->string('smtp_email', 255);
            $table->string('smtp_password', 255);
            $table->string('smtp_port', 255);
            $table->string('facebook', 255);
            $table->string('instagram', 255);
            $table->string('twitter', 255);
            $table->text('about_us');
            $table->text('contact');
            $table->text('references');
            $table->binary('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
