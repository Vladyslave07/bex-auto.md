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
        Schema::table('categories', function (Blueprint $table) {
            $table->text('image')->after('seo_text_id')->nullable();
            $table->text('sub_title')->after('seo_text_id')->nullable();
            $table->text('sub_title_text')->after('seo_text_id')->nullable();
            $table->text('h1')->after('seo_text_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('sub_title');
            $table->dropColumn('sub_title_text');
            $table->dropColumn('h1');
        });
    }
};
