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
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();

            $table->tinyInteger('active')->default(1);
            $table->string('slug')->unique();

            $table->text('title');
            $table->string('price');
            $table->text('images')->nullable();
            $table->longText('characteristic')->nullable();
            $table->timestamps();
        });

        Schema::create('car_equipment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_id')->index();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');

            $table->unsignedBigInteger('equipment_id')->index();
            $table->foreign('equipment_id')->references('id')->on('equipments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipments');
        Schema::table('car_equipment', function (Blueprint $table) {
            $table->dropForeign('car_equipment_car_id_foreign');
            $table->dropForeign('car_equipment_equipment_id_foreign');
        });
        Schema::dropIfExists('car_equipment');
    }
};
