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

        Schema::create('pro_utilisateur', function (Blueprint $table) {
            $table->bigInteger('uti_no')->autoIncrement(); // Utiliser bigIncrements pour une clé primaire auto-incrémentée
            $table->string('uti_username', 15);
            $table->string('uti_email', 70);
            $table->string('uti_role', 30);
            $table->string('uti_password', 100);
            $table->bigInteger('uti_per_no');
            $table->foreign('uti_per_no')->references('per_no')->on('pro_personne');
            //$table->bigInteger('uti_pre_no'); // Déclarer comme une clé étrangère non signée
            //$table->foreign('uti_pre_no')->references('pre_no')->on('pro_prediction'); // Assurez-vous que le nom de la table est correct
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pro_utilisateur');
    }
};
