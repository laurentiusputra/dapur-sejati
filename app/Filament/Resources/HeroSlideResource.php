<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroSlideResource\Pages;
use App\Filament\Resources\HeroSlideResource\RelationManagers;
use App\Models\HeroSlide;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeroSlideResource extends Resource
{
    protected static ?string $model = HeroSlide::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Menggunakan Section pembungkus bawaan facade Forms agar layout form rapi ke bawah
                Forms\Components\Section::make('Informasi Konten Banner')
                    ->schema([
                        Forms\Components\TextInput::make('badge')
                            ->label('Badge Teks (Opsional)')
                            ->placeholder('Contoh: 🌶️ OPEN PO WEEKLY: SPICY CHICKEN RISOL ACTIVE'),
                        
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Banner')
                            ->required()
                            ->placeholder('Contoh: Kehangatan Rasa Dari Dapur Ke Meja Makanmu'),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi Banner')
                            ->required()
                            ->rows(3)
                            ->placeholder('Tuliskan deskripsi lengkap promosi menu di sini...'),

                        Forms\Components\FileUpload::make('image_path')
                            ->label('Foto Background Banner')
                            ->disk('s3') // Menghubungkan langsung upload file ke Supabase Storage S3
                            ->directory('hero-banners')
                            ->image()
                            ->required(),

                        Forms\Components\TextInput::make('button_text')
                            ->label('Teks Tombol')
                            ->default('Explore Menu PO 👇')
                            ->required(),

                        Forms\Components\TextInput::make('button_url')
                            ->label('Link URL Tombol')
                            ->default('#menu')
                            ->required(),

                        Forms\Components\TextInput::make('sort_order')
                            ->label('Urutan Slide')
                            ->numeric()
                            ->default(0)
                            ->required(),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktifkan Slide Ini')
                            ->default(true)
                            ->required(),
                    ])->columns(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Menampilkan preview foto banner dari Supabase S3 di baris tabel admin
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Background')
                    ->disk('s3'),

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Banner')
                    ->searchable()
                    ->limit(30),

                Tables\Columns\TextColumn::make('badge')
                    ->label('Badge')
                    ->limit(20)
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),

                // Kolom toggle interaktif untuk menyalakan/mematikan banner langsung dari tabel
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Status Aktif'),
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
            'index' => Pages\ListHeroSlides::route('/'),
            'create' => Pages\CreateHeroSlide::route('/create'),
            'edit' => Pages\EditHeroSlide::route('/{record}/edit'),
        ];
    }
}