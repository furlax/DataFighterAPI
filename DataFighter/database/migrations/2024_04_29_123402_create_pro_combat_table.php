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

        Schema::create('pro_combat', function (Blueprint $table) {
            $table->bigInteger('com_no')->autoIncrement();
            $table->time('com_heuredebut');
            $table->time('com_heurefin');
            $table->string('com_lieu', 60);
            $table->bigInteger('com_cat_no');
            $table->foreign('com_cat_no')->references('cat_no')->on('pro_categorie');
            $table->bigInteger('com_org_no');
            $table->foreign('com_org_no')->references('org_no')->on('pro_organisation');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pro_combat');
    }
};
