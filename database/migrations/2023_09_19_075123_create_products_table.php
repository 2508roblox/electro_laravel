<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_category_id');
            $table->string('name');
            $table->unsignedBigInteger('brand_id');
            $table->string('slug');
            $table->string('brand')->nullable();
            $table->mediumText('small_description');
            $table->longText('description');
            $table->integer('price');
            $table->integer('promotion_price')->nullable();
            $table->integer('quantity')->nullable()->default(0);
            $table->tinyInteger('hot');
            $table->string('status');
            $table->string('publish_date')->nullable();
            $table->mediumText('meta_keyword');
            $table->mediumText('meta_description');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
