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
            Schema::connection($connection)->table('btn_text', function (Blueprint $table) {
                $table->string('btn_type')->default(\App\Enums\BtnTextType::BuyBtn->value);
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
            Schema::connection($connection)->table('btn_text', function (Blueprint $table) {
                $table->dropColumn('btn_type');
            });
        }
    }
};
