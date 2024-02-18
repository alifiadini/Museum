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
            $table->string('name');
            $table->decimal('price_anak_anak', 8, 2);
            $table->decimal('price_mahasiswa', 8, 2);
            $table->decimal('price_dewasa', 8, 2);
            $table->integer('total_quota');
            $table->integer('remaining_quota');
            $table->date('event_date');
            $table->date('expiry_date');
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
