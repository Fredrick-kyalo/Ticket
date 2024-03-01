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
            $table->bigIncrements('reservation_id');
            $table->unsignedBigInteger('ticket_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('event_id');
            $table->integer('no_of_tickets');
            $table->date('reservation_date');
            $table->timestamps();

            

            // Define ticket_id as a foreign key referencing the id column of the tickets table
            $table->foreign('ticket_id')->references('ticket_id')->on('ticket');

            // Define user_id as a foreign key referencing the id column of the users table
           // $table->foreign('user_id')->references('User_id')->on('userdetails');

            // Define event_id as a foreign key referencing the id column of the events table
            //$table->foreign('event_id')->references('event_id')->on('events');

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
