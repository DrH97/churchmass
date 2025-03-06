<?php

namespace App\Livewire\Admin;

use App\Models\Mass;
use Livewire\Component;
use Livewire\WithPagination;

class Masses extends Component
{
    use WithPagination;

    public string $search = '';


    public function render()
    {
        $masses = Mass::with('church:id,name')
        ->where('day', 'like', "%$this->search%")
            ->orWhere('time', 'like', "%$this->search%")
            ->orWhere('language', 'like', "%$this->search%")
            ->orWhere('name', 'like', "%$this->search%")
            ->paginate(10);

        return view('livewire.admin.masses', [
            'masses' => $masses,
        ]);
    }
}
