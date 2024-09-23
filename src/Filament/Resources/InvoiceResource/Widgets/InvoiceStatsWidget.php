<?php

namespace TomatoPHP\FilamentInvoices\Filament\Resources\InvoiceResource\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use TomatoPHP\FilamentInvoices\Filament\Resources\InvoiceResource\Pages\ListInvoices;
use TomatoPHP\FilamentInvoices\Models\Invoice;

use Filament\Widgets\Concerns\InteractsWithPageTable;

class InvoiceStatsWidget extends StatsOverviewWidget
{

    use InteractsWithPageTable;


    protected function getTablePage(): string
    {
        return ListInvoices::class;
    }

    public function getStats(): array
    {
        $query = Invoice::query();
        return [
            StatsOverviewWidget\Stat::make(trans('filament-invoices::messages.invoices.widgets.count'), "")
                ->icon('heroicon-o-currency-dollar')
                ->color('info')
                ->chart([65, 59, 80, 81, 56, 55, 40])
                ->value($this->getPageTableQuery()->count()),
            StatsOverviewWidget\Stat::make(trans('filament-invoices::messages.invoices.widgets.paid') , "")
                ->icon('heroicon-o-currency-dollar')
                ->color('success')
                ->chart([65, 59, 80, 81, 56, 55, 40])
                ->value(number_format($this->getPageTableQuery()->where('status', 'paid')->sum('total'), 2)),
            StatsOverviewWidget\Stat::make(trans('filament-invoices::messages.invoices.widgets.due'), "")
                ->icon('heroicon-o-currency-dollar')
                ->color('danger')
                ->chart([65, 59, 80, 81, 56, 55, 40])
                ->value(number_format(collect(
                    $this->getPageTableQuery()
                        ->where('status', '!=','paid')
                        ->where('status', '!=','cancelled')
                        ->where('status', '!=','estimate')
                        ->get()
                )->sum(fn($item)=>($item->total - $item->paid)), 2)),
        ];
    }
}
