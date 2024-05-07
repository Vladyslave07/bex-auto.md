<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private $connections = ['mysql', 'kz_mysql'];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        foreach ($this->connections as $connection) {
            Schema::connection($connection)->create('price_prefixes', function (Blueprint $table) {
                $table->id();

                $table->text('title');
                $table->string('slug')->unique();
                $table->boolean('active')->default(true);
                $table->integer('sort')->default(500);

                $table->timestamps();
            });
            Schema::connection($connection)->table('cars', function (Blueprint $table) {
                $table->foreignId('price_prefix_id')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_prefixes');
    }
};
