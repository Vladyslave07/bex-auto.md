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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(0);
            $table->integer('sort')->default(500);

            $table->text('title');
            $table->text('sub_title')->nullable();
            $table->text('sub_title_text')->nullable();
            $table->text('slug');
            $table->mediumText('image')->nullable();

            $table->string('youtube_link')->nullable();

            $table->unsignedBigInteger('faq_id')->nullable();
            $table->foreign('faq_id')->references('id')->on('faqs');

            $table->unsignedBigInteger('seo_text_id')->nullable();
            $table->foreign('seo_text_id')->references('id')->on('seo_texts');

            $table->mediumText('text')->nullable();

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
        Schema::dropIfExists('services');
    }
};
