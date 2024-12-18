<?php

namespace App\Filament\Resources;

    use App\Filament\Resources\ApiTokenResource\Pages;
    use App\Models\ApiToken;
    use Filament\Forms\Components\Checkbox;
    use Filament\Forms\Components\DatePicker;
    use Filament\Forms\Components\Placeholder;
    use Filament\Forms\Components\TextInput;
    use Filament\Forms\Form;
    use Filament\Resources\Resource;
    use Filament\Tables\Actions\BulkActionGroup;
    use Filament\Tables\Actions\DeleteAction;
    use Filament\Tables\Actions\DeleteBulkAction;
    use Filament\Tables\Actions\EditAction;
    use Filament\Tables\Columns\TextColumn;
    use Filament\Tables\Table;

    class ApiTokenResource extends Resource {
        protected static ?string $model = ApiToken::class;

        protected static ?string $slug = 'api-tokens';

        protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

        public static function form(Form $form): Form
        {
        return $form
        ->schema([//
        TextInput::make('name'),

        TextInput::make('token_hash')
        ->required(),

        DatePicker::make('expires_at')
        ->label('Expires Date'),

        Checkbox::make('revoked'),

        Placeholder::make('created_at')
        ->label('Created Date')
        ->content(fn (?ApiToken $record): string => $record?->created_at?->diffForHumans() ?? '-'),

        Placeholder::make('updated_at')
        ->label('Last Modified Date')
        ->content(fn (?ApiToken $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
        ]);
        }

        public static function table(Table $table): Table
        {
        return $table
        ->columns([
        TextColumn::make('name')
        ->searchable()
        ->sortable(),

        TextColumn::make('expires_at')
        ->label('Expires Date')
        ->date(),

        TextColumn::make('revoked'),
        ])
        ->filters([
        //
        ])
        ->actions([
        EditAction::make(),
        DeleteAction::make(),
        ])
        ->bulkActions([
        BulkActionGroup::make([
        DeleteBulkAction::make(),
        ]),
        ]);
        }

        public static function getPages(): array
        {
        return [
        'index' => Pages\ListApiTokens::route('/'),
'create' => Pages\CreateApiToken::route('/create'),
'edit' => Pages\EditApiToken::route('/{record}/edit'),
        ];
        }

        public static function getGloballySearchableAttributes(): array
        {
        return ['name'];
        }
    }