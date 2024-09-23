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
            null => Tab::make('Актуальные'),
            'Все счета' => Tab::make()->query(fn (Builder $query) => $query->withTrashed()),
            'Оплаченные' => Tab::make()->query(fn (Builder $query) => $query->withTrashed()->where('status', 'paid')),
            'Не оплаченные' => Tab::make()->query(fn (Builder $query) =>
            $query->withTrashed()->whereNotIn('status', ['paid', 'draft'])
            ),
            'Удаленные' => Tab::make()->query(fn (Builder $query) => $query->onlyTrashed()),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
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
