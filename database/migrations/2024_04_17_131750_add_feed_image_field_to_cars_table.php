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
            Schema::connection($connection)->table('cars', function (Blueprint $table) {
                $table->text('feed_image')->nullable();
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
            Schema::connection($connection)->table('cars', function (Blueprint $table) {
                $table->dropColumn('feed_image');
            });
        }
    }
};
