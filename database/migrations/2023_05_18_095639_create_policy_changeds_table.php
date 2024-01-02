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
        Schema::create('policy_changeds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('policy_id');
            $table->foreign('policy_id')->references('id')->on('policy');
            $table->string('content', 225);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('policy_changeds');
    }
};
