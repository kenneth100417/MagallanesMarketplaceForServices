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
        Schema::create('verification_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('user_type');
            $table->string('business_name');
            $table->string('name');
            $table->string('business_address');
            $table->string('document_type');
            $table->string('document');
            $table->string('status')->default('0'); // pending
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verification_requests');
    }
};


// to be continued.. gagawa ng model the proced ss pag submit, gagawa ng route and controller