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
            Schema::connection($connection)->table('form_results', function (Blueprint $table) {
                $table->string('utm_content')->after('country')->nullable();
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
            Schema::connection($connection)->table('form_results', function (Blueprint $table) {
                $table->dropColumn('utm_content');
            });
        }
    }
};
