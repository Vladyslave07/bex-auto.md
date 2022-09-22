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
            $table->integer('lot_id')->after('pin')->index()->nullable();
            $table->string('vin')->after('pin')->nullable();
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
            $table->dropIndex('cars_lot_id_index');
        });

        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn('lot_id');
            $table->dropColumn('vin');
        });
    }
};
