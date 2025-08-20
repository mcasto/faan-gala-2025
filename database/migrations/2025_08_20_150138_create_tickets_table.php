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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('purchaser_name');
            $table->string('email');
            $table->string('phone');
            $table->integer('quantity')->default(1);
            $table->string('payment_method');
            $table->string('table_number_or_ambassador');
            $table->text('vegetarian_requirement');
            $table->text('note_from_rsvp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
