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
        Schema::create('cards', function (Blueprint $table) {
            $table->id('card_id');
            $table->foreignId('account_id')->constrained('accounts','account_id')->cascadeOnDelete();
            $table->foreignId('client_id')->constrained('clients', 'client_id')->cascadeOnDelete();
            $table->string('card_number')->unique();
            $table->date('expiry_date');
            $table->boolean('status')->default(true);
            $table->string('cvv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
