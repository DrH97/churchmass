<?php

use App\Models\Church;
use App\Models\Mass;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);


test('migrations, factories and seeders can run', function () {
    $this->assertDatabaseEmpty(Church::getTableName());
    $this->assertDatabaseEmpty(Mass::getTableName());

    // Run the DatabaseSeeder...
    $this->seed();

    $this->assertDatabaseCount(Church::getTableName(), 11);
    $this->assertDatabaseCount(Mass::getTableName(), 104);
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
