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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('tickets_id')->constrained('tickets')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('quantity_anak_anak')->default(0);
            $table->integer('quantity_mahasiswa')->default(0);
            $table->integer('quantity_dewasa')->default(0);
            $table->decimal('total_amount', 8, 2);
            $table->timestamp('transaction_date');
            $table->date('booking_date')->nullable();
            $table->string('barcode')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

