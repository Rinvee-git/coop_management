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
        $user = static::getModel()::create($data);

        $qrData = json_encode([
            'user_id'  => $user->user_id,
            'username' => $user->username,
        ]);

        $qrCode = QrCode::format('png')
                        ->size(200)
                        ->generate($qrData);

        $filename = 'qrcodes/user_' . $user->user_id . '.png';
        Storage::disk('public')->put($filename, $qrCode);

        $user->update(['qr_code' => $filename]);

        return $user;
    }
}