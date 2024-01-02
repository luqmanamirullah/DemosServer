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
        Schema::table('policy', function (Blueprint $table) {
            $table->string('policy_entity', 100)->after('policy_source');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('policy', function (Blueprint $table) {
            $table->dropColumn('policy_entity');
        });
    }
};
