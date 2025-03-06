<?php

use App\Livewire\Admin\Churches;
use App\Models\Church;
use App\Models\User;
use Livewire\Livewire;


it('can create church', function () {
    $this->actingAs(User::factory()->create());

    $church = Church::factory()->create();

    Livewire::test(Churches::class)
        ->call('deleteChurch', $church->id);

    $this->assertTrue(Church::whereId($church->id)->doesntExist());
});
