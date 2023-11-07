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
        Schema::create('entries', function (Blueprint $table) {
            $table->id('entry_id');
            $table->uuid('product');
            $table->double('amount', 10, 2);
            $table->uuid('delivered');
            $table->uuid('recived');
            $table->timestamps();
            // Relations
            $table
                ->foreign('delivered')
                ->references('supplier_id')
                ->on('suppliers')
                ->onDelete('cascade');
            $table
                ->foreign('recived')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entries');
    }
};
