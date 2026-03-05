<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Roles
        $roles = [
            'Admin','Manager','Staff','Member','Cashier','Loan Officer','Account Officer','Teller'
        ];

        $roleMap = [];
        foreach ($roles as $name) {
            $roleMap[$name] = Role::firstOrCreate(
                ['name' => $name],
                ['guard_name' => 'web']
            );
        }

        // Helper: upsert profile + upsert user
        $upsertUser = function (
            string $email,
            string $username,
            string $roleName,
            string $first,
            string $last,
            string $password = 'password'
        ) use ($roleMap) {

            // 1) Upsert profile by unique email
            $profile = Profile::updateOrCreate(
                ['email' => $email],
                [
                    'first_name'  => $first,
                    'middle_name' => null,
                    'last_name'   => $last,
                    'roles_id'    => $roleMap[$roleName]->id,
                ]
            );

            // IMPORTANT: keep profile_id if that's your PK, otherwise use $profile->id
            $profileKey = $profile->profile_id; // change to $profile->id if needed

            // 2) Upsert user by username (or use profile_id if that's unique)
            User::updateOrCreate(
                ['username' => $username],
                [
                    'password'   => Hash::make($password),
                    'profile_id' => $profileKey,
                ]
            );
        };

        // Known accounts you care about now
        $upsertUser('admin@example.com',          'admin',          'Admin',           'Admin',   'User');
        $upsertUser('manager@example.com',        'manager',        'Manager',         'Manager', 'User');
        $upsertUser('member@example.com',         'member',         'Member',          'Member',  'User');
        $upsertUser('loanofficer@example.com',    'loanofficer',    'Loan Officer',    'Loan',    'Officer');
        $upsertUser('accountofficer@example.com', 'accountofficer', 'Account Officer', 'Account', 'Officer');
    }
}