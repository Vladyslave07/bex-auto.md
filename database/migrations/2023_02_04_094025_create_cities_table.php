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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();

            $table->boolean('active')->default(1);
            $table->integer('sort')->default(500);

            $table->text('title');
            $table->text('title_m')->nullable();
            $table->string('slug')->unique();

            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            $table->foreignId('seo_text_id')->nullable();

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
        Schema::dropIfExists('cities');
    }
};
