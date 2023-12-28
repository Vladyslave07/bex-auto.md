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
        Schema::connection('mysql')->table('brands', function (Blueprint $table) {
            $table->boolean('is_search')->default(0)->after('show_in_block');
        });
        Schema::connection('kz_mysql')->table('brands', function (Blueprint $table) {
            $table->boolean('is_search')->default(0)->after('show_in_block');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
