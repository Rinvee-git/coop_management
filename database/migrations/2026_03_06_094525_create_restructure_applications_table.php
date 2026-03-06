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
        Schema::create('restructure_applications', function (Blueprint $table) {
            $table->id(); // primary key

            $table->foreignId('loan_application_id')
                ->constrained('loan_applications', 'loan_application_id')
                ->onDelete('cascade'); // if loan application deleted, remove restructure

            $table->string('status')->default('pending'); // pending, approved, rejected

            $table->decimal('new_principal', 14, 2)->nullable();
            $table->decimal('new_interest', 5, 2)->nullable();
            $table->date('new_maturity_date')->nullable();

            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restructure_applications');
    }
};