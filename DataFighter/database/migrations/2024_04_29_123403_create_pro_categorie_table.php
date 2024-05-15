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

        Schema::create('pro_categorie', function (Blueprint $table) {
            $table->bigInteger('cat_no')->autoIncrement();
            $table->string('cat_nom', 50);
            $table->bigInteger('cat_poidsmin');
            $table->bigInteger('cat_poidsmax');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pro_categorie');
    }
};
