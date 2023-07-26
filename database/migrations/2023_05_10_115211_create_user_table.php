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
        Schema::create('user', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('user_name')->nullable();
            $table->string('user_email')->nullable();
            $table->string('user_username')->nullable();
            $table->string('google_id')->nullable();
            $table->string('user_password')->nullable();
            $table->integer('user_status')->default(1);
            // $table->integer('payment_status')->default(0);
            $table->timestamps();

        });
    }
   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
