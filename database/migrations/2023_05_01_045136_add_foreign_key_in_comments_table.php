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
        Schema::table('comments', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('comment');
            $table->unsignedBigInteger('news_id')->after('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('news_id')->references('id')->on('news');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_user_id_foreign');
            $table->dropForeign('comments_news_id_foreign');
            $table->dropColumn('user_id');
            $table->dropColumn('news_id');
        });
    }
};
