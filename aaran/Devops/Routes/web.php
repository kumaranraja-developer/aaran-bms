<?php
use Illuminate\Support\Facades\Route;

Route::get('job-managers',\Aaran\Devops\Livewire\Class\JobManagerList::class)->name('job-managers');
