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
        Schema::create('ticket', function (Blueprint $table) {
            $table->bigIncrements('ticket_id');
            $table->unsignedBigInteger('event_id');
            $table->string('ticket_type', 50);
            $table->integer('ticket_price');
            $table->timestamps();
            
            // Define event_id as a foreign key referencing the id column of the events table
            $table->foreign('event_id')->references('event_id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket');
    }
};
