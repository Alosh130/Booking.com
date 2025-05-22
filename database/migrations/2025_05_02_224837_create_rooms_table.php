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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id');
            $table->string('room_name');
            $table->boolean('breakfast');
            $table->string('cancellation_policy');
            $table->unsignedInteger('price_per_night')->default(100);
            $table->unsignedInteger('minimum_price')->default(0);
            $table->decimal('service_charge',8,2);
            $table->decimal('city_tax',8,2);
            $table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('hotels')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
