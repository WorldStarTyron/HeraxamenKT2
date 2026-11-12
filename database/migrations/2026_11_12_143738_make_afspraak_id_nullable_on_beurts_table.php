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
        Schema::table('beurts', function (Blueprint $table) {
            $table->unsignedInteger('afspraak_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('beurts', function (Blueprint $table) {
            $table->unsignedInteger('afspraak_id')->nullable(false)->change();
        });
    }
};
