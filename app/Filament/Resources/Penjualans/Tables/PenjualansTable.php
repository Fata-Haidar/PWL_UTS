<?php

namespace App\Filament\Resources\Penjualans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PenjualansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('penjualan_kode')
                    ->label('Kode Penjualan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('user.nama')
                    ->label('Kasir')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('pembeli')
                    ->label('Pembeli')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('penjualan_tanggal')
                    ->label('Tanggal')
                    ->dateTime('d-m-Y H:i')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d-m-Y H:i'),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}