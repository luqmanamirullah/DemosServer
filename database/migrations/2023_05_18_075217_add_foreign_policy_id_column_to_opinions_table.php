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
        Schema::table('opinions', function (Blueprint $table) {
            $table->unsignedBigInteger('policy_id')->after('id');
            $table->foreign('policy_id')->references('id')->on('policy');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('opinions', function (Blueprint $table) {
            $table->dropForeign('opinions_policy_id_foreign');
            $table->dropColumn('policy_id');
        });
    }
};
