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
        Schema::create('societes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nom');
            $table->string('adresse')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('fax')->nullable();
            $table->string('adresse_bulletin')->nullable();
            $table->string('logo')->nullable();
            $table->string('site_web')->nullable();
            $table->string('sigle')->nullable();
            $table->date('date_creation')->nullable();
            $table->string('description')->nullable();
            $table->string('type_societe')->nullable();
            $table->string('secteur_activite')->nullable();
            $table->string('statut_juridique')->nullable();
            $table->string('rccm')->nullable();
            $table->string('cnps_maticule_employeur')->nullable();
            $table->string('cnps_code_activite')->nullable();
            $table->string('cnps_code_agence')->nullable();
            $table->string('cnps_code_etablissement')->nullable();
            $table->string('cnps_agence_rattachement')->nullable();
            $table->string('cnps_periodicite_paiement')->nullable();
            $table->string('cnps_periodicite_paiement_cmu')->nullable();
            $table->string('imp_ncontribuable')->nullable();
            $table->string('imp_centre')->nullable();
            $table->string('imp_periodicite_declaration')->nullable();
            $table->string('imp_regime_fiscal')->nullable();
            $table->foreignId('charte_social_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('societes');
    }
};
