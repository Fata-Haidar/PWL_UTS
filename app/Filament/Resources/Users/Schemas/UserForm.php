<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\Level;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('level_id')
                    ->label('Level')
                    ->options(Level::pluck('level_nama', 'level_id'))
                    ->searchable()
                    ->required(),

                TextInput::make('username')
                    ->label('Username')
                    ->required()
                    ->maxLength(20)
                    ->unique(ignoreRecord: true),

                TextInput::make('nama')
                    ->label('Nama')
                    ->required()
                    ->maxLength(100),

                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->revealable()
                    ->required()
                    ->maxLength(255),
            ]);
    }
}