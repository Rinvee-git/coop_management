<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class UserAvatarCoopIdSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $index => $user) {

            // Generate Coop ID if missing
            if (!$user->coop_id) {
                $coopId = 'COOP-' . date('Y') . '-' . str_pad($user->user_id, 3, '0', STR_PAD_LEFT);
                $user->coop_id = $coopId;
                $this->command->info("Coop ID set for {$user->username}: {$coopId}");
            }

            // Generate avatar using UI Avatars (no imagick needed)
            $initial  = strtoupper(substr($user->username, 0, 1));
            $colors   = ['0d9488', '0f766e', '6366f1', 'f59e0b', 'ef4444', '8b5cf6', '10b981'];
            $color    = $colors[$user->user_id % count($colors)];

            $avatarUrl = "https://ui-avatars.com/api/?name={$initial}&background={$color}&color=fff&size=200&bold=true&format=png";

            try {
                $response = Http::timeout(10)->get($avatarUrl);

                if ($response->successful()) {
                    $filename = 'avatars/avatar_' . $user->user_id . '.png';
                    Storage::disk('public')->put($filename, $response->body());
                    $user->avatar = $filename;
                    $this->command->info("Avatar generated for {$user->username}");
                }
            } catch (\Exception $e) {
                $this->command->warn("Failed avatar for {$user->username}: " . $e->getMessage());
            }

            $user->save();
        }

        $this->command->info('All avatars and Coop IDs generated successfully.');
    }
}