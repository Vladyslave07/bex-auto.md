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
        Schema::dropIfExists('category_domain');
        Schema::dropIfExists('brand_domain');
        Schema::dropIfExists('domain_seo_text');
        Schema::dropIfExists('domain_footer_menu');
        Schema::dropIfExists('domain_menu');

        Schema::table('branches', function (Blueprint $table) {
            $table->dropdropColumn('domain_id');
        });
        Schema::table('form_results', function (Blueprint $table) {
            $table->dropdropColumn('domain_id');
        });
        Schema::table('news', function (Blueprint $table) {
            $table->dropdropColumn('domain_id');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropdropColumn('domain_id');
        });
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropdropColumn('domain_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
