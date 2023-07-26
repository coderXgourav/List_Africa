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
        Schema::create('listing', function (Blueprint $table) {
            $table->id('listing_id');
           $table->unsignedBigInteger('cat_id');
           $table->foreign('cat_id')->references('id')->on('category');
           $table->text('listing_title');
           $table->string('address');
           $table->string('country')->nullable();
           $table->string('lat')->nullable();
           $table->string('lan')->nullable();
           $table->string('phone_number')->nullable();
           $table->string('mobile_number')->nullable();
           $table->string('fax')->nullable();
           $table->string('email')->nullable();
           $table->string('website')->nullable();
           $table->text('description')->nullable();
           $table->string('year')->nullable();
           $table->string('employe')->nullable();
           $table->string('manager')->nullable();
           $table->string('photo')->nullable();
           $table->string('gallery_1')->nullable();
           $table->string('gallery_2')->nullable();
           $table->string('gallery_3')->nullable();
           $table->string('gallery_4')->nullable();
           $table->string('sun_start')->nullable();
           $table->string('sun_end')->nullable();
           $table->string('mon_start')->nullable();
           $table->string('mon_end')->nullable();
           $table->string('tue_start')->nullable();
           $table->string('tue_end')->nullable();
           $table->string('wed_start')->nullable();
           $table->string('wed_end')->nullable();
           $table->string('thusday_start')->nullable();
           $table->string('thusday_end')->nullable();
           $table->string('friday_start')->nullable();
           $table->string('friday_end')->nullable();
           $table->string('saturday_start')->nullable();
           $table->string('saturday_end')->nullable();

           $table->string('status')->default(1);
           $table->string('admin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing');
    }
};