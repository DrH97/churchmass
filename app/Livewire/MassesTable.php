<?php

namespace App\Livewire;

use App\Models\Mass;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class MassesTable extends DataTableComponent
{
    protected $model = Mass::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Day", "day")
                ->sortable(),
            Column::make("Time", "time")
                ->sortable(),
            Column::make("Language", "language")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
