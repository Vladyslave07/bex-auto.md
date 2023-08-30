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
        Schema::connection('mysql')->create('banks', function (Blueprint $table) {
            $table->id();

            $table->boolean('active')->default(1);
            $table->integer('sort')->default(500);

            $table->text('title');
            $table->text('slug')->nullable();
            $table->text('image')->nullable();
            $table->text('btn_text')->nullable();
            $table->text('link_for_new_cars')->nullable();
            $table->text('link_for_old_cars')->nullable();

            $table->timestamps();
        });

        Schema::connection('kz_mysql')->create('banks', function (Blueprint $table) {
            $table->id();

            $table->boolean('active')->default(1);
            $table->integer('sort')->default(500);

            $table->text('title');
            $table->text('slug')->nullable();
            $table->text('image')->nullable();
            $table->text('btn_text')->nullable();
            $table->text('link_for_new_cars')->nullable();
            $table->text('link_for_old_cars')->nullable();

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
        Schema::connection('kz_mysql')->dropIfExists('banks');
        Schema::connection('mysql')->dropIfExists('banks');
    }
};
