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
        Schema::create('staff_details', function (Blueprint $table) {
            $table->id('staff_id');

            $table->foreignId('profile_id')
                ->constrained('profiles', 'profile_id')
                ->cascadeOnDelete();

            $table->string('position', 45);
            $table->string('staff_detailscol', 45)->nullable();

            $table->foreignId('branch_id')
                ->constrained('branches', 'branch_id');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_details');
    }
};
