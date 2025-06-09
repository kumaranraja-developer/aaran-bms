<?php

use Illuminate\Support\Facades\Route;

Route::get('templates', \Aaran\UI\Livewire\Class\Index::class)->name('templates');
Route::get('icons', \Aaran\UI\Livewire\Class\Icons::class)->name('icons');


Route::get('/ui', \Aaran\UI\Livewire\Class\Index::class)->name('ui.index');
Route::get('/ui/{slug}', \Aaran\UI\Livewire\Class\Show::class)->name('ui.show');
