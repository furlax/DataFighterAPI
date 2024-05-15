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

        Schema::create('pro_prediction', function (Blueprint $table) {
            $table->bigInteger('pre_no')->autoIncrement();
            $table->bigInteger('pre_comb_no'); // stocker l'id du combattant
            $table->bigInteger('pre_choix'); // 0 ou 1 poue victoire ou défaite  // Assuming this is the correct column name in `pro_utilisateur`
            $table->bigInteger('pre_uti_no'); // stocker l'id de l'utilisateur
            $table->bigInteger('pre_com_no');
            $table->foreign('pre_com_no')->references('com_no')->on('pro_combat');
            $table->foreign('pre_uti_no')->references('uti_no')->on('pro_utilisateur');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pro_prediction');
    }
};
