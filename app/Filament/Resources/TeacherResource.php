<?php

namespace App\Filament\Resources;

    use App\Filament\Resources\TeacherResource\Pages;
    use App\Models\Teacher;
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

    class TeacherResource extends Resource {
        protected static ?string $model = Teacher::class;

        protected static ?string $slug = 'teachers';

        protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

        public static function form(Form $form): Form
        {
        return $form
        ->schema([//
        Select::make('department_id')
        ->relationship('department', 'name')
        ->searchable()
        ->required(),

        TextInput::make('first_name')
        ->required(),

        TextInput::make('last_name')
        ->required(),

        TextInput::make('patronymic')
        ->required(),

        TextInput::make('position')
        ->required(),

        TextInput::make('email')
        ->required(),

        TextInput::make('phone')
        ->required(),

        Placeholder::make('created_at')
        ->label('Created Date')
        ->content(fn (?Teacher $record): string => $record?->created_at?->diffForHumans() ?? '-'),

        Placeholder::make('updated_at')
        ->label('Last Modified Date')
        ->content(fn (?Teacher $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
        ]);
        }

        public static function table(Table $table): Table
        {
        return $table
        ->columns([
        TextColumn::make('department.name')
        ->searchable()
        ->sortable(),

        TextColumn::make('first_name'),

        TextColumn::make('last_name'),

        TextColumn::make('patronymic'),

        TextColumn::make('position'),

        TextColumn::make('email')
        ->searchable()
        ->sortable(),

        TextColumn::make('phone'),
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
        'index' => Pages\ListTeachers::route('/'),
'create' => Pages\CreateTeacher::route('/create'),
'edit' => Pages\EditTeacher::route('/{record}/edit'),
        ];
        }

        protected static function getGlobalSearchEloquentQuery(): Builder
        {
        return parent::getGlobalSearchEloquentQuery()->with(['department']);
        }

        public static function getGloballySearchableAttributes(): array
        {
        return ['email', 'department.name'];
        }

        public static function getGlobalSearchResultDetails(Model $record): array
        {
        $details = [];

        if ($record->department) {
$details['Department'] = $record->department->name;}

        return $details;
        }
    }
