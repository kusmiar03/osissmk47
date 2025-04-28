<?php

namespace App\Filament\Resources\BannerAdvertismentsResource\Pages;

use App\Filament\Resources\BannerAdvertismentsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords; 

class ListBannerAdvertisments extends ListRecords
{
    protected static string $resource = BannerAdvertismentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
