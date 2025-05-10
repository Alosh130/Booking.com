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
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('base_multiplier',5,2)->default(1.00);
            $table->timestamps();
        });
        
        Schema::create('room_seasons',function(Blueprint $table){
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('season_id');
            $table->decimal('custom_multiplier',5,2)->nullable();
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('rooms')
            ->onDelete('cascade');
            $table->foreign('season_id')->references('id')->on('seasons')
            ->onDelete('cascade');
            $table->primary(['room_id','season_id']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_seasons');
        Schema::dropIfExists('seasons');
        
    }
};
