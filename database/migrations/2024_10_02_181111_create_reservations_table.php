<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('cin_number');
            $table->string('matricule');  // Assuming this links to the 'Voiture' table
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
            
            // Optionally, if you want to create relationships
            // $table->foreign('cin_number')->references('cin_number')->on('users')->onDelete('cascade');
            // $table->foreign('matricule')->references('matricule')->on('voitures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
}

