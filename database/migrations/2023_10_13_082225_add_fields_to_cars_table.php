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
        Schema::connection('mysql')->table('cars', function (Blueprint $table) {
            $table->bolean('commission_car')->default(false)->after('price');
            $table->integer('status_sort')->default(500)->after('price');
        });
        Schema::connection('kz_mysql')->table('cars', function (Blueprint $table) {
            $table->bolean('commission_car')->default(false)->after('price');
            $table->integer('status_sort')->default(500)->after('price');
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
            //
        });
    }
};
