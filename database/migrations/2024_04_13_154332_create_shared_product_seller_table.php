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
        Schema::create('shared_product_seller', function (Blueprint $table) {
            $table->unsignedBigInteger('shared_product_id');
            $table->unsignedBigInteger('seller_id');
            $table->timestamps();

            $table->foreign('shared_product_id')->references('id')->on('shared_products')->onDelete('cascade');
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');

            // Add unique constraint if necessary
            $table->unique(['shared_product_id', 'seller_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shared_product_seller');
    }
};
