<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

// Import komponen Form
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

// Import komponen Tabel
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    // Mengatur ikon menu pesanan di sidebar admin
    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationLabel = 'Pesanan (Orders)';

    /**
     * Membentuk Form untuk Tambah / Edit data Pesanan
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('customer_name')
                    ->label('Nama Pelanggan')
                    ->required()
                    ->maxLength(255),

                // Dropdown untuk memilih produk secara live dari database Supabase
                Select::make('product_id')
                    ->label('Produk Kuliner')
                    ->relationship('product', 'name') // Mengambil nama dari relasi product()
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('quantity')
                    ->label('Jumlah Porsi')
                    ->numeric()
                    ->integer()
                    ->minValue(1)
                    ->required(),

                TextInput::make('total_price')
                    ->label('Total Harga (Rp)')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),

                // Dropdown pilihan status pesanan dapur
                Select::make('status')
                    ->label('Status Pesanan')
                    ->options([
                        'pending' => 'Menunggu Pembayaran',
                        'processing' => 'Sedang Dimasak / Diproses',
                        'success' => 'Selesai / Terkirim',
                        'cancelled' => 'Dibatalkan',
                    ])
                    ->required(),

                Textarea::make('shipping_address')
                    ->label('Alamat Pengiriman')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    /**
     * Membentuk struktur daftar list pesanan (Tabel)
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer_name')
                    ->label('Pelanggan')
                    ->searchable()
                    ->sortable(),

                // Menampilkan nama produk hasil relasi dari Supabase
                TextColumn::make('product.name')
                    ->label('Menu Makanan')
                    ->sortable(),

                TextColumn::make('quantity')
                    ->label('Porsi')
                    ->alignCenter(),

                TextColumn::make('total_price')
                    ->label('Total Bayar')
                    ->money('idr')
                    ->sortable(),

                // Fitur canggih: Admin bisa langsung ganti status pesanan lewat tabel tanpa buka halaman edit
                SelectColumn::make('status')
                    ->label('Status Dapur')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'success' => 'Success',
                        'cancelled' => 'Cancelled',
                    ])
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Waktu Order')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                // Filter cepat untuk menyortir pesanan berdasarkan status tertentu
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'success' => 'Success',
                        'cancelled' => 'Cancelled',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(), // Tombol hapus data pesanan
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
