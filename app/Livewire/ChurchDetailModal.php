<?php

namespace App\Livewire;

use App\Models\Church;
use Livewire\Component;

class ChurchDetailModal extends Component
{
    public bool $isOpen = false;
    public Church $church;

    protected $listeners = ['openModal', 'closeModal'];

    public function openModal($id): void
    {
        $this->church = Church::with('masses')->find($id);
        $this->isOpen = true;
    }

    public function closeModal(): void
    {
        $this->isOpen = false;
    }

    public function render(): object
    {
        return view('livewire.church-detail-modal');
    }
}
