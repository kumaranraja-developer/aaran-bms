<?php

use Aaran\Core\User\Livewire\Class;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::get('/user-list', Class\UserList::class)->name('user-list');
    Route::get('/user-details', Class\UserDetailShow::class)->name('user-details');

});

