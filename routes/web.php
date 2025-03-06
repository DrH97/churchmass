<?php

use App\Livewire\Admin\Churches;
use App\Livewire\Admin\Masses;
use App\Livewire\Home;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Route::redirect('dashboard', 'dashboard/churches');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::get('dashboard/churches', Churches::class)->name('admin.churches');
    Route::get('dashboard/masses', Masses::class)->name('admin.masses');

});

require __DIR__.'/auth.php';
