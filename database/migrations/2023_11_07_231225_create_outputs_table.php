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
        Schema::create('outputs', function (Blueprint $table) {
            $table->id('output_id');
            $table->uuid('product');
            $table->bigInteger('concept')->unsigned();
            $table->double('amount', 10, 2);
            $table->uuid('delivered');
            $table->uuid('recived');
            $table->timestamps();
            // Relations
            $table
                ->foreign('delivered')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');
            $table
                ->foreign('recived')
                ->references('customer_id')
                ->on('customers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outputs');
    }
};
