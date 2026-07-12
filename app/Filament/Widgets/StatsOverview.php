<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class StatsOverview extends BaseWidget
{
    // 🛠️ [BARU] Mengunci posisi widget agar tampil di paling atas
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        // Menghitung akumulasi omset sukses katering Dapur Sejati
        $revenue = Order::where('status', '!=', 'cancelled')->sum('total_price');
        $activeOrders = Order::where('status', 'pending')->count();
        $menuItems = Product::count();
        $totalCustomers = User::count();

        return [
            Stat::make('TOTAL REVENUE', 'Rp ' . number_format($revenue, 0, ',', '.'))
                ->description('Pantau akumulasi omset berkala toko')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),
            Stat::make('ACTIVE ORDERS', $activeOrders . ' Orders')
                ->description('Total antrean pre-order aktif')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
            Stat::make('MENU ITEMS', $menuItems . ' Menu')
                ->description('Varian menu katering terdaftar')
                ->descriptionIcon('heroicon-m-cake')
                ->color('info'),
            Stat::make('TOTAL CUSTOMERS', $totalCustomers . ' Users')
                ->description('Pelanggan terhubung dengan sistem')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary'),
        ];
    }
}