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
        Schema::create('bhp_lab', function (Blueprint $table) {
            $table->id('id_bhp_lab');
            $table->unsignedBigInteger('id_bhp');
            $table->unsignedBigInteger('id_lab');
            $table->foreign('id_bhp')->references('id_bhp')->on('bhps')->onDelete('cascade');
            $table->foreign('id_lab')->references('id_lab')->on('labs')->onDelete('cascade');
            $table->integer('qty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bhp_lab');
    }
};
