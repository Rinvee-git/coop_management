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
        ->constrained('member_details', 'member_id');

    $table->foreignId('loan_product_id')
        ->constrained('loan_products', 'loan_product_id');

    $table->decimal('amount_requested', 14, 2);
    $table->integer('term_months');

    $table->text('purpose')->nullable();

    $table->enum('status', [
        'Pending',
        'Under Review',
        'Approved',
        'Rejected',
        'Cancelled'
    ])->default('Pending');

    // Staff evaluation notes
    $table->text('evaluation_notes')->nullable();

    // BI/CI notes (background investigation)
    $table->text('bici_notes')->nullable();

    $table->timestamp('submitted_at')->nullable();
    $table->timestamp('approved_at')->nullable();

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
