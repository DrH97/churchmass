<?php

use App\Models\Church;
use App\Models\Mass;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);


test('migrations, factories and seeders can run', function () {
    $this->assertDatabaseEmpty(Church::getTableName());
    $this->assertDatabaseEmpty(Mass::getTableName());

    // Seed...
    Church::factory(10)->hasMasses(1)->create();

    $this->assertDatabaseCount(Church::getTableName(), 10);
    $this->assertDatabaseCount(Mass::getTableName(), 10);
});


test('masses should be unique', function () {
    $church = Church::factory()->create();

    $mass = Mass::factory()->for($church)->create();

    $this->assertDatabaseCount($church->getTable(), 1);
    $this->assertDatabaseCount($mass->getTable(), 1);

    Mass::factory()
        ->for($church)
        ->create( [
            'day' => $mass->day,
            'time' => $mass->time,
            'language' => $mass->language,
        ]);

})->throws(\Illuminate\Database\UniqueConstraintViolationException::class);
