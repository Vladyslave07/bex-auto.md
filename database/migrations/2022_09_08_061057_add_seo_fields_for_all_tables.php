<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->text('meta_title')->after('pin')->nullable();
            $table->text('meta_description')->after('pin')->nullable();
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->text('meta_title')->after('seo_text_id')->nullable();
            $table->text('meta_description')->after('seo_text_id')->nullable();
        });

        Schema::table('services', function (Blueprint $table) {
            $table->text('meta_title')->after('text')->nullable();
            $table->text('meta_description')->after('text')->nullable();
        });

        Schema::table('news', function (Blueprint $table) {
            $table->text('meta_title')->after('image')->nullable();
            $table->text('meta_description')->after('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn('meta_title');
            $table->dropColumn('meta_description');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('meta_title');
            $table->dropColumn('meta_description');
        });

        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('meta_title');
            $table->dropColumn('meta_description');
        });

        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('meta_title');
            $table->dropColumn('meta_description');
        });
    }
};
