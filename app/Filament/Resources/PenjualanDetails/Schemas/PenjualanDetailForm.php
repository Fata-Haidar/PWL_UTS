<?php

namespace App\Filament\Resources\PenjualanDetails\Schemas;

use App\Models\Barang;
use App\Models\Penjualan;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PenjualanDetailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('penjualan_id')
                    ->label('Kode Penjualan')
                    ->options(Penjualan::pluck('penjualan_kode', 'penjualan_id'))
                    ->searchable()
                    ->required(),

                Select::make('barang_id')
                    ->label('Barang')
                    ->options(Barang::pluck('barang_nama', 'barang_id'))
                    ->searchable()
                    ->required(),

                TextInput::make('harga')
                    ->label('Harga')
                    ->numeric()
                    ->required()
                    ->prefix('Rp'),

                TextInput::make('jumlah')
                    ->label('Jumlah')
                    ->numeric()
                    ->required()
                    ->minValue(1),
            ]);
    }
}