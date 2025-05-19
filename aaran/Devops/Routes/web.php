<?php
use Illuminate\Support\Facades\Route;

Route::get('job-managers',\Aaran\Devops\Livewire\Class\JobList::class)->name('job-managers');
Route::get('task-managers/{id}',\Aaran\Devops\Livewire\Class\TaskList::class)->name('task-managers');
Route::get('task-comments/{id}',\Aaran\Devops\Livewire\Class\TaskCommentsList::class)->name('task-comments');
Route::get('task-reply',\Aaran\Devops\Livewire\Class\TaskReplyList::class)->name('task-reply');
