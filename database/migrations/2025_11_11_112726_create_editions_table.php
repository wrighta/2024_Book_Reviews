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
        Schema::create('editions', function (Blueprint $table) {
            $table->id();
        
            // Foreign key to books table
            $table->foreignId('book_id')
                  ->constrained()
                  ->onDelete('cascade');

            // Edition-specific fields
            $table->string('edition_number')->nullable();   // e.g. "1st", "2nd", "Revised"
            $table->year('publication_year')->nullable();
            $table->string('isbn')->nullable();
            $table->string('publisher')->nullable();
            $table->decimal('price', 8, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('editions');
    }
};
