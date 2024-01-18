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
            Schema::connection($connection)->create('btn_text', function (Blueprint $table) {
                $table->id();

                $table->text('title');
                $table->string('slug')->unique();
                $table->boolean('active')->default(true);
                $table->integer('sort')->default(500);

                $table->string('car_status')->nullable();
                $table->text('btn_text');

                $table->timestamps();
            });

            Schema::connection($connection)->create('btn_text_car', function (Blueprint $table) {
                $table->id();
                $table->foreignId('btn_text_id')->default(null);
                $table->foreignId('car_id')->default(null);
                $table->timestamps();
            });
            Schema::connection($connection)->create('btn_text_category', function (Blueprint $table) {
                $table->id();
                $table->foreignId('btn_text_id')->default(null);
                $table->foreignId('category_id')->default(null);
                $table->timestamps();
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
        foreach ($this->connections as $connection) {
            Schema::connection($connection)->dropIfExists('btn_text');
            Schema::connection($connection)->dropIfExists('btn_text_category');
            Schema::connection($connection)->dropIfExists('btn_text_car');
        }
    }
};
