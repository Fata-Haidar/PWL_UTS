<?php

namespace App\Filament\Resources\Barangs\Schemas;

use App\Models\Kategori;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

class BarangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    Step::make('Data Barang')
                        ->schema([
                            Select::make('kategori_id')
                                ->label('Kategori')
                                ->options(Kategori::pluck('kategori_nama', 'kategori_id'))
                                ->searchable()
                                ->required(),

                            TextInput::make('barang_kode')
                                ->label('Kode Barang')
                                ->required()
                                ->maxLength(10)
                                ->unique(ignoreRecord: true),

                            TextInput::make('barang_nama')
                                ->label('Nama Barang')
                                ->required()
                                ->maxLength(100),
                        ]),

                    Step::make('Harga Barang')
                        ->schema([
                            TextInput::make('harga_beli')
                                ->label('Harga Beli')
                                ->numeric()
                                ->required()
                                ->prefix('Rp'),

                            TextInput::make('harga_jual')
                                ->label('Harga Jual')
                                ->numeric()
                                ->required()
                                ->prefix('Rp'),
                        ]),
                ])
                    ->columnSpanFull()
                    ->skippable()
                    ->submitAction(new HtmlString('
                        <button type="submit"
                            class="fi-btn fi-btn-size-md rounded-lg bg-primary-600 px-4 py-2 text-white">
                            Save
                        </button>
                    ')),
            ]);
    }
}