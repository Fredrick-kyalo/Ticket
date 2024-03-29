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
        Schema::create('reservations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('event_id');
            $table->string('email');
            $table->integer('no_of_tickets');
            $table->date('reservation_date');
            $table->enum('status',['paid','unpaid'])->default('unpaid');
            $table->timestamps();
            

            // Define event_id as a foreign key referencing the id column of the events table
            $table->foreign('event_id')->references('id')->on('events');

            // You can define other foreign key relationships if needed

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
