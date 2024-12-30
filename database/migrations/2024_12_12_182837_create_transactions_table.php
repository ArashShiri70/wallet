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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->decimal('price', 20, 2);
            $table->enum('type', ['deposit', 'withdraw']);
            $table->enum('status', ['pending', 'completed', 'failed']);
            $table->decimal('moment_tax');
            $table->decimal('moment_fee');
            $table->foreignId('gateway_id')->references('id')->on('gateways')->cascadeOnDelete();
            $table->timestamps();

            $table->index(['type', 'user_id', 'status']);
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
