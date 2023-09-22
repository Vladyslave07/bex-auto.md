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
            $table->boolean('show_price_from')->default(0);
        });

        Schema::connection('kz_mysql')->table('cars', function (Blueprint $table) {
            $table->boolean('show_price_from')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('field_to_cars', function (Blueprint $table) {
            //
        });
    }
};
