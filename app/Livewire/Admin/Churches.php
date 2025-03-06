<?php

namespace App\Livewire\Admin;

use App\Models\Church;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Churches extends Component
{
    use WithPagination;

    public string $search = '';

    protected $listeners = ['church-created' => '$refresh'];

    public function render()
    {

        $churches = Church::where('name', 'like', "%$this->search%")
            ->orWhere('type', 'like', "%$this->search%")
            ->orWhere('address', 'like', "%$this->search%")
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.admin.churches', [
            'churches' => $churches,
        ]);
    }

    public function deleteChurch(Church $church)
    {
        DB::transaction(function () use ($church) {
            $church->masses()->delete();
            $church->delete();
        });
    }

}
