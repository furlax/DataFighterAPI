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

        Schema::create('pro_personne', function (Blueprint $table) {
            $table->bigInteger('per_no')->autoIncrement();
            $table->string('per_nom', 50);
            $table->string('per_prenom', 50);
            $table->string('per_pays', 50);
            $table->date('per_datenaissance');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pro_personne');
    }
};
