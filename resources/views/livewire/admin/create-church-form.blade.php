<?php

use App\Models\Church;
use Flux\Flux;
use Livewire\Volt\Component;

new class extends Component {
    public string $name = '';
    public string $address = '';
    public string $type = 'church';
    public float $latitude;
    public float $longitude;

    /**
     * Delete the currently authenticated user.
     */
    public function createChurch(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'in:basilica,parish,church,chapel'],
            'latitude' => ['required', 'numeric', 'between:-90,90'],
            'longitude' => ['required', 'numeric', 'between:-180,180'],
        ]);

        Church::create($validated);

        $this->dispatch('church-created');

        Flux::modals()->close();
    }
}; ?>


<section class="mt-10 space-y-6">
    <flux:modal name="create-church" :show="$errors->isNotEmpty()" focusable class="max-w-lg">
        <form wire:submit="createChurch" class="space-y-6">

            <div>
                <flux:heading size="lg">Add Church</flux:heading>
                <flux:subheading>Add church details.</flux:subheading>
            </div>

            <flux:input wire:model="name" :label="__('Name')"/>

            <flux:input wire:model="address" :label="__('Address')"/>

            <flux:radio.group wire:model="type" :label="__('Type')">
                <flux:radio value="basilica" label="Basilica"/>
                <flux:radio value="parish" label="Parish"/>
                <flux:radio value="church" label="Church"/>
                <flux:radio value="chapel" label="chapel"/>
            </flux:radio.group>

            <flux:input wire:model="latitude" :label="__('latitude')" type="number" min="-90" max="90"/>

            <flux:input wire:model="longitude" :label="__('Longitude')" type="number" min="-180" max="180"/>

            <div class="flex justify-end space-x-2">
                <flux:spacer/>

                <flux:button type="submit" variant="primary">Save changes</flux:button>
            </div>
        </form>
    </flux:modal>
</section>
