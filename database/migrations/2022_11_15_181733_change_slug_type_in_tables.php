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
            $table->string('slug')->unique()->change();
        });

        Schema::table('services', function (Blueprint $table) {
            $table->string('slug')->unique()->change();
        });

        Schema::table('brands', function (Blueprint $table) {
            $table->string('slug')->unique()->change();
        });

        Schema::table('menus', function (Blueprint $table) {
            $table->string('slug')->change();
        });
    }

    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropIndex('categories_slug_unique');
        });

        Schema::table('services', function (Blueprint $table) {
            $table->dropIndex('services_slug_unique')->unique()->change();
        });

        Schema::table('brands', function (Blueprint $table) {
            $table->dropIndex('brands_slug_unique');
        });

        Schema::table('menus', function (Blueprint $table) {
            $table->dropIndex('menus_slug_unique');
        });
    }
};
