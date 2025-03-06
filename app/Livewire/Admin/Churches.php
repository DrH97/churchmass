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
        return view('livewire.admin.churches', [
            'churches' => Church::where('name', 'like', "%$this->search%")->paginate(10),
        ]);
    }

}
