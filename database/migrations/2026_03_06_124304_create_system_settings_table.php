<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('system_settings', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->longText('value')->nullable();
            $table->timestamps();
        });

        // Seed defaults
        $defaults = [
            ['key' => 'app_name',    'value' => config('app.name')],
            ['key' => 'logo',        'value' => null],
            ['key' => 'favicon',     'value' => null],
            ['key' => 'primary_color', 'value' => '#0d9488'],
            ['key' => 'font',        'value' => 'Rajdhani'],
        ];

        foreach ($defaults as $setting) {
            DB::table('system_settings')->insertOrIgnore($setting);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('system_settings');
    }
};








