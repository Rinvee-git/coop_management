<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
    {
        // 1. Auto-generate Coop ID
        $latestUser      = \App\Models\User::orderBy('user_id', 'desc')->first();
        $nextId          = $latestUser ? $latestUser->user_id + 1 : 1;
        $data['coop_id'] = 'COOP-' . date('Y') . '-' . str_pad($nextId, 3, '0', STR_PAD_LEFT);

        // 2. Create the user
        $user = static::getModel()::create($data);

        // 3. Load profile relationship
        $user->load('profile');

        // 4. Build JSON QR data
        $qrData = json_encode([
            'user_id'  => $user->user_id,
            'coop_id'  => $user->coop_id,
            'username' => $user->username,
            'profile'  => $user->profile->full_name ?? 'N/A',
            'status'   => 'Active',
        ]);

        // 5. Generate QR Code as SVG
        $qrCode = QrCode::format('svg')
                        ->size(200)
                        ->margin(1)
                        ->generate($qrData);

        // 6. Save to storage
        $filename = 'qrcodes/user_' . $user->user_id . '.svg';
        Storage::disk('public')->put($filename, $qrCode);

        // 7. Update user record
        $user->update(['qr_code' => $filename]);

        return $user;
    }
}