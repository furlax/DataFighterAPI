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

        Schema::create('pro_combattant', function (Blueprint $table) {
            $table->bigInteger('comb_no')->autoIncrement();
            $table->bigInteger('comb_poids');
            $table->string('comb_niveau', 50);
            $table->string('comb_sexe', 1);
            $table->bigInteger('comb_taille');
            $table->bigInteger('comb_typ_no');
            $table->foreign('comb_typ_no')->references('typ_no')->on('pro_type_sport');
            $table->bigInteger('comb_per_no');
            $table->foreign('comb_per_no')->references('per_no')->on('pro_personne');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pro_combattant');
    }
};
