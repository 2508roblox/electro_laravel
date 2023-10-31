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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status')->default('hidden')->comment(' hidden, published, scheduled');
            $table->string('image')->nullable();
            $table->string('slug');
            $table->string('title');
            $table->mediumText('description');
            $table->mediumText('seo_description');
            $table->string('publish_date')->nullable();
            $table->timestamps();
        });
    }
    // `CateID` int(11) NOT NULL,
    // `Name` varchar(250) DEFAULT NULL,
    // `Status` bit(1) DEFAULT NULL,
    // `Image` varchar(250) DEFAULT NULL,
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
