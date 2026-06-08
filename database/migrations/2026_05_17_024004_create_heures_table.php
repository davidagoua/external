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
        Schema::create('heures', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('nombre');
            $table->unsignedBigInteger('montant');
            $table->foreignIdFor(\App\Models\Bulletin::class)->constrained()
            ->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heures');
    }
};
