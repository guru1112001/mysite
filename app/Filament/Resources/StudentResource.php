<?php

namespace App\Filament\Resources;

use Columns\Text;
use Filament\Forms;
use App\Models\City;
use Filament\Tables;
use App\Models\Country;
use App\Models\Student;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Column;
use Filament\Resources\Resource;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StudentResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StudentResource\RelationManagers;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->required()
                ->maxLength(100)
                ->rules(['alpha','required','max:100']),
                TextInput::make('class')
                ->required()
                ->maxLength(10)
                ->numeric(),
                TextInput::make('rollno')
                ->required()
                ->maxLength(100)
                ->numeric(),
                Radio::make('gender')
                ->options([
                    'Male' => 'Male',
                    'Female' => 'Female',
                    'Others' => 'Others'
                ])
                ->required(),
                TextInput::make('Email')
                ->email(),
                FileUpload::make('file_path'),
                Select::make('country_id')
                ->label('Country')
                ->options(function () {
                return Country::pluck('name', 'id')->toArray();
                
            })
                ->required(),

                Select::make('city_id')
                ->label('City')
                ->options(function () {
                    return City::pluck('name', 'id')->toArray();
                })
                ->required()
                
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('name')
                ->label('Name')
                ->sortable()
                ->searchable(),
                
            TextColumn::make('class')
                ->label('Class')
                ->sortable()
                ->searchable(),
                
            TextColumn::make('rollno')
                ->label('Roll No')
                ->sortable()
                ->searchable(),
                
            TextColumn::make('gender')
                ->label('Gender')
                ->sortable()
                ->searchable(),
                
            TextColumn::make('email')
                ->label('Email')
                ->sortable()
                ->searchable(),
                
            TextColumn::make('country_id')
                ->label('Country')
                ->sortable()
                ->searchable(),
            
            
                
            TextColumn::make('city_id')
                ->label('City')
                ->sortable()
                ->searchable(),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
