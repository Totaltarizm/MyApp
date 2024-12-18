<?php

namespace App\Filament\Resources;

    use App\Filament\Resources\DepartmentResource\Pages;
    use App\Models\Department;
    use Filament\Forms\Components\Placeholder;
    use Filament\Forms\Components\Select;
    use Filament\Forms\Components\TextInput;
    use Filament\Forms\Form;
    use Filament\Resources\Resource;
    use Filament\Tables\Actions\BulkActionGroup;
    use Filament\Tables\Actions\DeleteAction;
    use Filament\Tables\Actions\DeleteBulkAction;
    use Filament\Tables\Actions\EditAction;
    use Filament\Tables\Columns\TextColumn;
    use Filament\Tables\Table;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Model;

    class DepartmentResource extends Resource {
        protected static ?string $model = Department::class;

        protected static ?string $slug = 'departments';

        protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

        public static function form(Form $form): Form
        {
        return $form
        ->schema([//
        Select::make('faculty_id')
        ->relationship('faculty', 'name')
        ->searchable()
        ->required(),

        TextInput::make('name')
        ->required(),

        TextInput::make('code')
        ->required(),

        TextInput::make('description')
        ->required(),

        Placeholder::make('created_at')
        ->label('Created Date')
        ->content(fn (?Department $record): string => $record?->created_at?->diffForHumans() ?? '-'),

        Placeholder::make('updated_at')
        ->label('Last Modified Date')
        ->content(fn (?Department $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
        ]);
        }

        public static function table(Table $table): Table
        {
        return $table
        ->columns([
        TextColumn::make('faculty.name')
        ->searchable()
        ->sortable(),

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
        'index' => Pages\ListDepartments::route('/'),
'create' => Pages\CreateDepartment::route('/create'),
'edit' => Pages\EditDepartment::route('/{record}/edit'),
        ];
        }

        protected static function getGlobalSearchEloquentQuery(): Builder
        {
        return parent::getGlobalSearchEloquentQuery()->with(['faculty']);
        }

        public static function getGloballySearchableAttributes(): array
        {
        return ['name', 'faculty.name'];
        }

        public static function getGlobalSearchResultDetails(Model $record): array
        {
        $details = [];

        if ($record->faculty) {
$details['Faculty'] = $record->faculty->name;}

        return $details;
        }
    }
