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
        Schema::table('services', function (Blueprint $table) {
            $table -> time('openTime');
            $table -> time('closingTime');
            $table -> string('openDays');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table -> dropColumn('openTime');
            $table -> dropColumn('closingTime');
            $table -> dropColumn('openDays');
        });
    }
};
