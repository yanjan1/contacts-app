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
        Schema::create('SentMail', function(Blueprint $table){
            $table->id();
            $table->string('to');
            $table->string('subject');
            $table->text('body');
            $table->timestamp('send_at')->nullable();
            $table->enum('type', ['email_verification', 'password_reset', 'email_change'])->default('email_verification');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SentMail');
    }
};