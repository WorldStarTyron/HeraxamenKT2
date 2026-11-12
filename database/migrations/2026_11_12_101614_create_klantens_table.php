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
        Schema::create('klantens', function (Blueprint $table) {
            $table->increments('klant_id');
            $table->string('klant_naam');
            $table->string('klant_email');
            $table->string('klant_telefoon');
            $table->string('klant_password');
            $table->enum('klant_role', ['admin', 'klant'])->default('klant');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klantens');
    }
};
