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
        Schema::connection('mysql')->table('form_results', function (Blueprint $table) {
            $table->foreignId('service_id')->nullable();
        });
        Schema::connection('kz_mysql')->table('form_results', function (Blueprint $table) {
            $table->foreignId('service_id')->nullable();
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
