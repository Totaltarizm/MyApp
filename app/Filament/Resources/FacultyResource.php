<?php

namespace App\Filament\Resources;

    use App\Filament\Resources\FacultyResource\Pages;
    use App\Models\Faculty;
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

    class FacultyResource extends Resource {
        protected static ?string $model = Faculty::class;

        protected static ?string $slug = 'faculties';

        protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

        public static function form(Form $form): Form
        {
        return $form
        ->schema([//
        TextInput::make('name')
        ->required(),

        TextInput::make('code')
        ->required(),

        TextInput::make('description')
        ->required(),

        Placeholder::make('created_at')
        ->label('Created Date')
        ->content(fn (?Faculty $record): string => $record?->created_at?->diffForHumans() ?? '-'),

        Placeholder::make('updated_at')
        ->label('Last Modified Date')
        ->content(fn (?Faculty $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
        ]);
        }

        public static function table(Table $table): Table
        {
        return $table
        ->columns([
        TextColumn::make('name')
        ->searchable()
        ->sortable(),

        TextColumn::make('code'),

        TextColumn::make('description'),
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
        'index' => Pages\ListFaculties::route('/'),
'create' => Pages\CreateFaculty::route('/create'),
'edit' => Pages\EditFaculty::route('/{record}/edit'),
        ];
        }

        public static function getGloballySearchableAttributes(): array
        {
        return ['name'];
        }
    }
