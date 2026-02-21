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
    Schema::create('loan_applications', function (Blueprint $table) {
        $table->id('loan_application_id');

        $table->foreignId('member_id')
            ->constrained('member_details', 'member_id')
            ->cascadeOnDelete();

        $table->foreignId('loan_product_id')
            ->constrained('loan_products', 'loan_product_id')
            ->cascadeOnDelete();

        $table->decimal('amount', 15, 2);
        $table->integer('term_months');

        $table->decimal('interest_rate', 5, 2);

        $table->enum('status', [
            'Pending',
            'Approved',
            'Rejected',
            'Released',
            'Completed'
        ])->default('Pending');

        $table->text('remarks')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_applications');
    }
};
