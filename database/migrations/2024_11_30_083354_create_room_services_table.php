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
        Schema::create('room_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_service_type_id');
            $table->foreign('room_service_type_id')->references('id')->on('room_service_types')->onDelete('cascade');
            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
            $table->integer('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_services');
    }
};
