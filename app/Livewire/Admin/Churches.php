<?php

namespace App\Livewire\Admin;

use App\Models\Church;
use Livewire\Component;
use Livewire\WithPagination;

class Churches extends Component
{
    use WithPagination;

    public string $search = '';

    public function render()
    {

        $churches = Church::where('name', 'like', "%$this->search%")
            ->orWhere('type', 'like', "%$this->search%")
            ->orWhere('address', 'like', "%$this->search%")
            ->paginate(10);

        return view('livewire.admin.churches', [
            'churches' => $churches,
        ]);
    }

}
