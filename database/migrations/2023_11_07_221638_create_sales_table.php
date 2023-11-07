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
        Schema::create('sales', function (Blueprint $table) {
            $table->id('sales_id');
            $table->uuid('customer');
            $table->uuid('product');
            $table->double('amount', 10, 2);
            $table->double('price', 10, 2);
            $table->double('total', 15, 2);
            $table->date('purchase_day');
            $table->timestamps();
            // Relations
            $table
                ->foreign('customer')
                ->references('customer_id')
                ->on('customers')
                ->onDelete('cascade');
            $table
                ->foreign('product')
                ->references('product_id')
                ->on('products')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
