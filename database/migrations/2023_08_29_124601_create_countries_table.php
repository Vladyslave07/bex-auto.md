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
        Schema::connection('mysql')->create('countries', function (Blueprint $table) {
            $table->id();

            $table->boolean('active')->default(1);
            $table->integer('sort')->default(500);

            $table->text('title');
            $table->string('slug')->unique();
            $table->text('image')->nullable();
            $table->longText('text')->nullable();
            $table->longText('auction_images')->nullable();

            $table->timestamps();
        });

        Schema::connection('kz_mysql')->create('countries', function (Blueprint $table) {
            $table->id();

            $table->boolean('active')->default(1);
            $table->integer('sort')->default(500);

            $table->text('title');
            $table->string('slug')->unique();
            $table->text('image')->nullable();
            $table->longText('text')->nullable();
            $table->longText('auction_images')->nullable();

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
        Schema::dropIfExists('countries');
    }
};
