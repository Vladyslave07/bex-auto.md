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

        Schema::connection('mysql')->create('service_popup', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->default(null);
            $table->foreignId('popup_id')->default(null);
            $table->timestamps();
        });

        Schema::connection('kz_mysql')->create('service_popup', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->default(null);
            $table->foreignId('popup_id')->default(null);
            $table->timestamps();
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
