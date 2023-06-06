<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->boolean('active')->default(1);
            $table->integer('sort')->default(500);

            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            $table->text('title');
            $table->text('slug');
            $table->text('description')->nullable();
            $table->text('sub_title')->nullable();
            $table->text('images')->nullable();
            $table->text('preview_image')->nullable();
            $table->text('youtube_link')->nullable();
            $table->double('price', 8, 2)->nullable();
            $table->text('info')->nullable();
            $table->enum('status', ['in_stock', 'expect', 'on_order', 'sold'])
                ->default('in_stock')
                ->nullable();

            $table->foreignId('domain_id');
            $table->foreignId('category_id');

            $table->timestamps();
        });

        Schema::create('car_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->index();
            $table->foreignId('product_id')->index();
        });

        Schema::create('product_property', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->index();
            $table->foreignId('property_id')->index();
            $table->text('value')->nullable()->default(null);
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('products');
    }
};
