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
        Schema::disableForeignKeyConstraints();

        Schema::create('pro_statistique', function (Blueprint $table) {
            $table->bigInteger('sta_resultat');
            $table->bigInteger('sta_point');
            $table->bigInteger('sta_duree');
            $table->boolean('sta_ko');
            $table->boolean('sta_tko');
            $table->boolean('sta_soumission');
            $table->boolean('sta_draw');
            $table->bigInteger('sta_coupdonner');
            $table->bigInteger('sta_coupreçu');
            $table->bigInteger('sta_comb_no');
            $table->bigInteger('sta_com_no');
            $table->primary(['sta_comb_no', 'sta_com_no']); // Définir une clé primaire composite
            $table->foreign('sta_comb_no')->references('comb_no')->on('pro_combattant');
            $table->foreign('sta_com_no')->references('com_no')->on('pro_combat');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pro_statistique');
    }
};
