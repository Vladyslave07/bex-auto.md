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
        Schema::connection('mysql')->table('categories', function (Blueprint $table) {
            $table->boolean('add_to_feed')->default(0)->nullable();
        });

        Schema::connection('kz_mysql')->table('categories', function (Blueprint $table) {
            $table->boolean('add_to_feed')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
