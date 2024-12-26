<?php

namespace App\Filament\Resources\ApiTokenResource\Pages;

use App\Filament\Resources\ApiTokenResource;
use App\Models\ApiToken;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

class CreateApiToken extends CreateRecord
{
    protected static string $resource = ApiTokenResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $plainToken = ApiToken::generateToken();
        $data['token_hash'] = hash('sha256',$plainToken);
        Notification::make()->title("Token was generated")->body("Your token: {$plainToken}")->success()->send();
        return $data;
    }

}
