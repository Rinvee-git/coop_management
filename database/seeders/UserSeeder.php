<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure default roles exist
        $userRole = Role::firstOrCreate(['name' => 'User'], ['guard_name' => 'web']);
        $adminRole = Role::firstOrCreate(['name' => 'Admin'], ['guard_name' => 'web']);

        // Create 10 random users with associated profiles
        for ($i = 0; $i < 10; $i++) {
            $first = fake()->firstName();
            $last = fake()->lastName();
            $email = fake()->unique()->safeEmail();

            $profile = Profile::create([
                'first_name' => $first,
                'middle_name' => null,
                'last_name' => $last,
                'email' => $email,
                'roles_id' => $userRole->id,
            ]);

            User::create([
                'username' => Str::slug($first . ' ' . $last) ?: ('user' . $i),
                'password' => Hash::make('password'),
                'profile_id' => $profile->profile_id,
            ]);
        }

        // Create a known admin user with a known password
        $adminProfile = Profile::create([
            'first_name' => 'Admin',
            'middle_name' => null,
            'last_name' => 'User',
            'email' => 'admin@example.com',
            'roles_id' => $adminRole->id,
        ]);

        User::create([
            'username' => 'admin',
            'password' => Hash::make('password'),
            'profile_id' => $adminProfile->profile_id,
        ]);
    }
}
