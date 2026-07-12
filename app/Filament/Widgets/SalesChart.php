<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Order;

class SalesChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Penjualan Bulanan';
    protected static ?string $description = 'Data visual performa omset kumulatif toko Dapur Sejati';
    
    protected int | string | array $columnSpan = '2';

    // 🛠️ [BARU] Menentukan urutan tampil di bawah statistik
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $monthlyRevenue = collect(range(1, 12))->map(function ($month) {
            return Order::whereYear('created_at', 2026)
                ->whereMonth('created_at', $month)
                ->sum('total_price');
        })->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Omset Masuk (Rp)',
                    'data' => $monthlyRevenue,
                    'borderColor' => '#ca9651',
                    'backgroundColor' => 'rgba(202, 150, 81, 0.05)',
                    'tension' => 0.4,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}