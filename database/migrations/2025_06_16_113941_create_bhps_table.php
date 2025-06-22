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
        Schema::create('bhps', function (Blueprint $table) {
            $table->id('id_bhp');
            $table->string('name_bhp');
            $table->string('description');
            $table->integer('minimum_stock');
            $table->unsignedBigInteger('id_unit')->nullable();
            $table->foreign('id_unit')->references('id_unit')->on('units')->onDelete('set null');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bhps');
    }
};
