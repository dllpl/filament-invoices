<?php

namespace TomatoPHP\FilamentInvoices\Filament\Resources\InvoiceResource\Pages;

use Filament\Resources\Components\Tab;
use TomatoPHP\FilamentInvoices\Facades\FilamentInvoices;
use TomatoPHP\FilamentInvoices\Filament\Resources\InvoiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use TomatoPHP\FilamentTypes\Models\Type;

use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Builder;

use Filament\Pages\Concerns\ExposesTableToWidgets;

class ListInvoices extends ListRecords
{

    use ExposesTableToWidgets;

    protected static string $resource = InvoiceResource::class;


    public function mount(): void
    {
        parent::mount();

        FilamentInvoices::loadTypes();
    }

    protected function getHeaderWidgets(): array
    {
        return [
            InvoiceResource\Widgets\InvoiceStatsWidget::class
        ];
    }

    public function getTabs(): array
    {
        return [
            'Сегодня' => Tab::make()->query(fn(Builder $query) => $query->whereDate('created_at', today())),
            'Текущий месяц' => Tab::make()->query(fn(Builder $query) => $query->whereMonth('created_at', now()->month)),
            'Прошлый месяц' => Tab::make()->query(fn(Builder $query) => $query->whereMonth('created_at', now()->subMonth()->month)),
            'Год' => Tab::make()->query(fn(Builder $query) => $query->whereYear('created_at', now()->year)),
        ];
    }

    public function getDefaultActiveTab(): string|int|null
    {
        return 'Текущий месяц';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-m-plus-circle')
                ->label('Новый счет'),
            Actions\Action::make('setting')
                ->hiddenLabel()
                ->tooltip(trans('filament-invoices::messages.invoices.actions.invoices_status'))
                ->icon('heroicon-o-cog')
                ->color('info')
                ->action(function (){
                    return redirect()->to(InvoiceStatus::getUrl());
                })
                ->label(trans('filament-invoices::messages.invoices.actions.invoices_status')),
        ];
    }
}
