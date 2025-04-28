<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerAdvertismentsResource\Pages;
use App\Filament\Resources\BannerAdvertismentsResource\RelationManagers;
use App\Models\BannerAdvertisments;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BannerAdvertismentsResource extends Resource
{
    protected static ?string $model = BannerAdvertisments::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('link')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('is_active')
                    ->required()
                    ->options([
                        "active" =>"Active",
                        "not_active" =>"Not Active"
                    ]),
                Forms\Components\Select::make('type')
                    ->required()
                    ->options([
                        "banner" =>"Banner",
                        "square" =>"Square"
                    ]),
                Forms\Components\FileUpload::make('thumbnail')
                    ->required()
                    ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('link')
                    ->searchable(), 
                Tables\Columns\TextColumn::make('is_active'),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('thumbnail'),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBannerAdvertisments::route('/'),
            'create' => Pages\CreateBannerAdvertisments::route('/create'),
            'edit' => Pages\EditBannerAdvertisments::route('/{record}/edit'),
        ];
    }
}
