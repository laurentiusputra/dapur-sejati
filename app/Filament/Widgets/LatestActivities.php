<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class LatestActivities extends Widget
{
    protected static string $view = 'Filament.widgets.latest-activities';
    
    protected int | string | array $columnSpan = '1';

    // 🛠️ [BARU] Menentukan urutan tampil setelah grafik bulanan
    protected static ?int $sort = 3;
}