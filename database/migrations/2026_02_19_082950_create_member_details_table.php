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
        Schema::create('member_details', function (Blueprint $table) {
                $table->id('member_id');

                $table->foreignId('profile_id')
                    ->constrained('profiles', 'profile_id')
                    ->cascadeOnDelete();

                $table->string('member_no', 45)->nullable();
                $table->text('employment_info')->nullable();
                $table->decimal('monthly_income', 14, 2)->nullable();

                $table->foreignId('membership_type_id')
                    ->constrained('membership_type', 'membership_type_id');

                $table->foreignId('branch_id')
                    ->constrained('branches', 'branch_id');

                $table->enum('status', ['Active','Inactive','Delinquent'])->nullable();

                $table->timestamps();
            });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_details');
    }
};
