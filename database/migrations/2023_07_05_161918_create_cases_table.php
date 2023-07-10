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
            $table->text('i')->nullable();
            $table->text('r')->nullable();
            $table->text('d')->nullable();
            $table->text('v')->nullable();
            $table->text('t')->nullable();
            $table->text('i_m')->nullable();
            $table->text('r_m')->nullable();
            $table->text('d_m')->nullable();
            $table->text('v_m')->nullable();
            $table->text('t_m')->nullable();

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
