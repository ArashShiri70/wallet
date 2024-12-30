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
        Schema::create('gateways', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('api_key');
            $table->string('username');
            $table->string('password');
            $table->decimal('transaction_fee_deposit');
            $table->decimal('transaction_fee_withdraw');
            $table->decimal('transaction_tax');
            $table->enum('status', ['enabled', 'disabled'])->default('disabled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gateways');
    }
};
