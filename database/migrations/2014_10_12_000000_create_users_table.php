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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('user_id')->primary()->default(DB::raw('(UUID())'));
            $table->string('name');
            $table->string('surnames');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->bigInteger('role')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
