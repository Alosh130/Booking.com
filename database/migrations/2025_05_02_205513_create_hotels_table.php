<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Hotel;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('rating',2,1);
            $table->string('rating_score');
            $table->string('city')->nullable();
            $table->string('Governorate');
            $table->decimal('distance_from_downtown',3,1);
            $table->string('url');
            $table->boolean('recommended')->default(false);
            $table->unsignedBigInteger('stars')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
