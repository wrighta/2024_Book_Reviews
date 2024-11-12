<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            // cascade here means if book is deleted so will the reviews
            $table->foreignId('book_id')->constrained()->onDelete('cascade');
            // cascade - if the user is deleted so are their reviews
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('rating')->unsigned()->default(1); // Rating 1-5
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
