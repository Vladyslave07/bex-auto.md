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
        Schema::table('car_category', function (Blueprint $table) {
            $table->index('car_id');
            $table->index('category_id');
        });

        Schema::table('car_models', function (Blueprint $table) {
            $table->index('brand_id');
        });

        Schema::table('car_property', function (Blueprint $table) {
            $table->index('car_id');
            $table->index('property_id');
        });

        Schema::table('category_faq', function (Blueprint $table) {
            $table->index('faq_id');
            $table->index('category_id');
        });

        Schema::table('cars', function (Blueprint $table) {
            $table->string('slug')->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('car_category', function (Blueprint $table) {
            $table->dropIndex('car_category_car_id_index');
            $table->dropIndex('car_category_category_id_index');
        });

        Schema::table('car_models', function (Blueprint $table) {
            $table->dropIndex('car_models_brand_id_index');
        });

        Schema::table('car_property', function (Blueprint $table) {
            $table->dropIndex('car_property_car_id_index');
            $table->dropIndex('car_property_property_id_index');
        });

        Schema::table('category_faq', function (Blueprint $table) {
            $table->dropIndex('category_faq_faq_id_index');
            $table->dropIndex('category_faq_category_id_index');
        });
    }
};
