<?php
use Illuminate\Support\Facades\Route;

Route::get('/user-settings',\Aaran\Core\Settings\Livewire\Class\Settings::class)->name('user.settings');
