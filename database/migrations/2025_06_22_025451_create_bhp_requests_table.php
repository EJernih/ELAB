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
        Schema::create('bhp_requests', function (Blueprint $table) {
            $table->id('id_request');
            $table->string('semester');
            $table->string('academic_year');
            $table->date('request_date');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('id_lab')->nullable();
            $table->foreign('id_lab')->references('id_lab')->on('labs')->onDelete('set null');
            $table->enum('status', [
                'pending', 
                'approved', 
                'approved_by_kalab',
                'approved_by_kajur',
                'on_process',
                'done',
                'rejected',
            ])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bhp_requests');
    }
};
