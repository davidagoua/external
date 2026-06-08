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
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('employe_id')->constrained();
            $table->string('libele');
            $table->unsignedBigInteger('salaire_base');
            $table->unsignedBigInteger('salaire_net')->nullable();
            $table->date('date_debut');
            $table->date('date_fin')->nullable();
            $table->unsignedInteger('duree');
            $table->string('pdf')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrats');
    }
};
