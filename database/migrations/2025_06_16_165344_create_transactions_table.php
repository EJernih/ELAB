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
            $table->id('id_transaction');
            $table->date('date_transaction');
            $table->enum('type_transaction', ['in', 'out']);
            $table->string('matakuliah');
            $table->foreignId('id_lab');
            $table->foreignId('id_bhp');
            $table->integer('quantity');
            $table->string('description');
            $table->timestamps();

            $table->foreign('id_lab')->references('id_lab')->on('labs')->onDelete('cascade');
            $table->foreign('id_bhp')->references('id_bhp')->on('bhps')->onDelete('cascade');
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
