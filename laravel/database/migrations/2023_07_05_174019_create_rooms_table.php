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
            $table->bigIncrements('id');
            $table->enum('room_type', ['Single', 'Double', 'Suite', 'King', 'Deluxe room', 'President Suite']);
            $table->enum('capacity', ['1', '2', '3', '4', '5', '6']);
            $table->string('img_url');
            $table->decimal('price_per_night', 8, 2);
            $table->timestamps();
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
