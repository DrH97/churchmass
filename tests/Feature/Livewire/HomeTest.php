<?php

use App\Livewire\Home;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Home::class)
        ->assertStatus(200);
});


it('has default properties', function () {
    Livewire::test(Home::class)
        ->assertSet('radius', 500)
        ->assertSet('massesNearby', true);

});

