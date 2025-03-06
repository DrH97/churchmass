<?php

namespace App\Livewire\Actions;

use Livewire\Component;

class AddChurchForm extends Component
{
    public string $name = '';


    /**
     * Delete the currently authenticated user.
     */
    public function createChurch(): void
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'latitude' => ['required', 'string', 'max:255'],
            'longitude' => ['required', 'string', 'max:255'],
        ]);

        $this->dispatch('church-created', id: 1);

    }
}
