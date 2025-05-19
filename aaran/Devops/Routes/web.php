<?php
use Illuminate\Support\Facades\Route;

Route::get('job-managers',\Aaran\Devops\Livewire\Class\JobManagerList::class)->name('job-managers');
Route::get('task-managers',\Aaran\Devops\Livewire\Class\TaskManagerList::class)->name('task-managers');
Route::get('task-commends',\Aaran\Devops\Livewire\Class\TaskCommendsList::class)->name('task-commends');
Route::get('task-reply',\Aaran\Devops\Livewire\Class\TaskReplyList::class)->name('task-reply');
Route::get('job-images',\Aaran\Devops\Livewire\Class\JobImagesList::class)->name('job-images');
