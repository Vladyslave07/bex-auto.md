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
        Schema::table('form_results', function (Blueprint $table) {
            $table->string('country')->nullable()->after('phone');
            $table->string('car')->nullable()->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_results', function (Blueprint $table) {
            $table->dropColumn('car');
            $table->dropColumn('country');
        });
    }
};
