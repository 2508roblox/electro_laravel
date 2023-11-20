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

        Schema::create('sku_variants', function (Blueprint $table) {
            $table->id();
            $table->string('sku');
            $table->unsignedBigInteger('variant_value_id');
            $table->timestamps();

            // Tạo foreign key cho variant_value_id

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sku_variants');
    }
};
