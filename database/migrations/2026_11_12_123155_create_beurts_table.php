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
        Schema::create('beurts', function (Blueprint $table) {
            $table->increments('beurt_id');
            $table->unsignedInteger('klant_id');
            $table->string('beurt_naam');
            $table->date('beurt_datum');
            $table->time('beurt_tijd');
             $table->integer('maximaal_aantal_auto');
       

            $table->foreign('klant_id')->references('klant_id')->on('klanten')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beurts');
    }
};
