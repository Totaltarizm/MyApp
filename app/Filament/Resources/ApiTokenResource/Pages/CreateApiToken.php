<?php

namespace App\Filament\Resources\ApiTokenResource\Pages;

    use App\Filament\Resources\ApiTokenResource;
    use Filament\Resources\Pages\CreateRecord;

    class CreateApiToken extends CreateRecord {
        protected static string $resource = ApiTokenResource::class;

        protected function getHeaderActions(): array {
        return [

        ];
        }
    }
