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

        Schema::create('pro_equipe', function (Blueprint $table) {
            $table->bigInteger('equ_no')->autoIncrement();
            $table->string('equ_nom', 40);
            $table->dateTime('equ_anneedebut');
            $table->dateTime('equ_anneefin')->nullable();
            $table->bigInteger('equ_per_no');
            $table->foreign('equ_per_no')->references('per_no')->on('pro_personne');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pro_equipe');
    }
};
