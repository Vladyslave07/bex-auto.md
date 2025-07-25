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
        Schema::connection('mysql')->create('employees', function (Blueprint $table) {
            $table->id();

            $table->boolean('active')->default(1);
            $table->integer('sort')->default(500);

            $table->text('name');
            $table->text('image')->nullable();
            $table->text('phone')->nullable();
            $table->text('email')->nullable();

            $table->timestamps();
        });

        Schema::connection('kz_mysql')->create('employees', function (Blueprint $table) {
            $table->id();

            $table->boolean('active')->default(1);
            $table->integer('sort')->default(500);

            $table->text('name');
            $table->text('image')->nullable();
            $table->text('phone')->nullable();
            $table->text('email')->nullable();

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
        Schema::dropIfExists('employees');
    }
};
