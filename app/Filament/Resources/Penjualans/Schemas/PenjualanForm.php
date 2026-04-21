<?php

namespace App\Filament\Resources\Penjualans\Schemas;

use App\Models\User;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PenjualanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('User / Kasir')
                    ->options(User::pluck('nama', 'user_id'))
                    ->searchable()
                    ->required(),

                TextInput::make('pembeli')
                    ->label('Pembeli')
                    ->required()
                    ->maxLength(50),

                TextInput::make('penjualan_kode')
                    ->label('Kode Penjualan')
                    ->required()
                    ->maxLength(20)
                    ->unique(ignoreRecord: true),

                DateTimePicker::make('penjualan_tanggal')
                    ->label('Tanggal Penjualan')
                    ->required(),
            ]);
    }
}