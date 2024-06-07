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
        Schema::create('loans', function (Blueprint $table) {
            $table->id('loan_id');
            $table->foreignId('client_id')->constrained('clients', 'client_id')->cascadeOnDelete();
            $table->foreignId('account_id')->constrained('accounts','account_id')->cascadeOnDelete();
            $table->string('loan_number')->unique();
            $table->decimal('amount', 10, 2);
            $table->decimal('interest_rate', 10, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};