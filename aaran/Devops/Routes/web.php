<?php
use Illuminate\Support\Facades\Route;

Route::get('job-managers',\Aaran\Devops\Livewire\Class\JobList::class)->name('job-managers');
Route::get('task-managers',\Aaran\Devops\Livewire\Class\TaskList::class)->name('task-managers');
Route::get('task-commends',\Aaran\Devops\Livewire\Class\TaskCommendsList::class)->name('task-commends');
Route::get('task-reply',\Aaran\Devops\Livewire\Class\TaskReplyList::class)->name('task-reply');
