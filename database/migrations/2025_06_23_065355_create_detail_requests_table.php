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
        Schema::create('detail_requests', function (Blueprint $table) {
            $table->id('id_detail_request');
            $table->unsignedBigInteger('id_request')->nullable();
            $table->foreign('id_request')->references('id_request')->on('bhp_requests')->onDelete('set null');
            $table->unsignedBigInteger('id_bhp')->nullable();
            $table->foreign('id_bhp')->references('id_bhp')->on('bhps')->onDelete('set null');
            $table->integer('quantity_requested');
            $table->text('referensi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_requests');
    }
};
