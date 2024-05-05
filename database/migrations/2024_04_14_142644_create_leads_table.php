<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->date('order_date')->default(DB::raw('CURRENT_DATE'));
            $table->string('store_reference');
            $table->string('store_name')->nullable();
            $table->string('customer_name');
            $table->string('customer_email')->nullable();
            $table->string('customer_phone');
            $table->string('customer_mobile')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('customer_city')->nullable();
            $table->string('customer_country');
            $table->string('item_sku');
            $table->string('warehouse');
            $table->unsignedInteger('quantity');
            $table->decimal('total', 10, 2);
            $table->string('currency');
            $table->string('status')->default('pending');
            $table->text('notes')->nullable();
            $table->foreignId('seller_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
