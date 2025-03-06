<?php

namespace App\Livewire;

use App\Models\Church;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ChurchesTable extends DataTableComponent
{
    protected $model = Church::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Type", "type")
                ->sortable(),
            Column::make("Address", "address")
                ->sortable(),
            Column::make("Latitude", "latitude")
                ->sortable(),
            Column::make("Longitude", "longitude")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
