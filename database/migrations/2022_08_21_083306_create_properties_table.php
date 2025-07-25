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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->enum('field_type', ['from_to_select', 'select_checkbox', 'select', 'checkbox', 'relation', 'text', 'number']);
            $table->enum('filter_type', ['from_to_select', 'select_checkbox', 'select', 'checkbox', 'buttons', 'text']);
            $table->string('relation')->nullable();
            $table->integer('step')->nullable();
            $table->string('prefix')->nullable();
            $table->text('options')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('sort')->nullable()->default(500);
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
        Schema::dropIfExists('properties');
    }
};
