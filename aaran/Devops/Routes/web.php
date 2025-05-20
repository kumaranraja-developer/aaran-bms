<?php
use Illuminate\Support\Facades\Route;

Route::get('job-managers',\Aaran\Devops\Livewire\Class\JobList::class)->name('job-managers');
Route::get('task-managers/{id}',\Aaran\Devops\Livewire\Class\TaskList::class)->name('task-managers');
Route::get('task-shows/{id}',\Aaran\Devops\Livewire\Class\TaskActivity::class)->name('task-shows');
Route::get('module',\Aaran\Devops\Livewire\Class\ModuleList::class)->name('module');

