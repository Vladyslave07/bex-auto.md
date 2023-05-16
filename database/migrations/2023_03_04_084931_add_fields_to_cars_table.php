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
        Schema::table('cars', function (Blueprint $table) {
            $table->boolean('full_template')->default(0);
            $table->text('sub_title')->nullable();
            $table->longText('benefits')->nullable();
            $table->longText('equipment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn('full_template');
            $table->dropColumn('sub_title');
            $table->dropColumn('benefits');
            $table->dropColumn('equipment');
        });
    }
};
