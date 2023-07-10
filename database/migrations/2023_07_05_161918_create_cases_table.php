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
        Schema::create('word_cases', function (Blueprint $table) {
            $table->id();

            $table->string('slug')->nullable();
            $table->string('i')->nullable();
            $table->string('r')->nullable();
            $table->string('d')->nullable();
            $table->string('v')->nullable();
            $table->string('t')->nullable();
            $table->string('i_m')->nullable();
            $table->string('r_m')->nullable();
            $table->string('d_m')->nullable();
            $table->string('v_m')->nullable();
            $table->string('t_m')->nullable();

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
        Schema::dropIfExists('word_cases');
    }
};
