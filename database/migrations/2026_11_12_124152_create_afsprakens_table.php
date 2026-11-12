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
        Schema::create('afsprakens', function (Blueprint $table) {
            $table->increments('afspraak_id');
            $table->unsignedInteger('klant_id');
            $table->string('Afspraak_title');
            $table->date('Afspraak_datum');
            $table->text('Afspraak_omschrijving');

            $table->foreign('klant_id')->references('klant_id')->on('klanten')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('afsprakens');
    }
};
