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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id('account_id');
            $table->foreignId('client_id')->constrained('clients', 'client_id')->cascadeOnDelete();
            $table->string('account_number')->unique();
            $table->enum('account_type', ['savings', 'checking', 'credit', 'loan']);
            $table->boolean('status')->default(true);
            $table->decimal('balance', 10, 2);
            $table->string('interest_rate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
