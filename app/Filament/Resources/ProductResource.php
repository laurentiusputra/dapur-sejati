<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

// Import komponen Form Input
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;

// Import komponen Kolom Tabel
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationLabel = 'Produk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama Produk')
                    ->required()
                    ->maxLength(255),

                TextInput::make('price')
                    ->label('Harga (Rp)')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),

                TextInput::make('stock')
                    ->label('Jumlah Stok')
                    ->numeric()
                    ->integer()
                    ->required(),

                Textarea::make('description')
                    ->label('Deskripsi Produk')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                FileUpload::make('image_path')
                    ->label('Foto Produk')
                    ->disk('public') // DITAMBAHKAN: Agar foto tersimpan di folder lokal (storage/app/public)
                    ->directory('products-gallery') // Nanti otomatis masuk ke folder: storage/app/public/products-gallery
                    ->visibility('public')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')
                    ->label('Gambar')
                    ->disk('public'), // DIUBAH DARI 's3' KE 'public': Agar preview gambar di tabel admin bisa muncul dari folder lokal

                TextColumn::make('name')
                    ->label('Nama Produk')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('price')
                    ->label('Harga')
                    ->money('idr')
                    ->sortable(),

                TextColumn::make('stock')
                    ->label('Stok')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}