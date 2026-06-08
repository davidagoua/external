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
        Schema::table('contrats', function (Blueprint $table) {
            $table->foreignId('etablissement_id')->nullable()
                ->constrained('etablissements')
                ->nullOnDelete();
        });

        Schema::table('bulletins', function (Blueprint $table) {
            $table->foreignId('etablissement_id')->nullable()
                ->constrained('etablissements')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
