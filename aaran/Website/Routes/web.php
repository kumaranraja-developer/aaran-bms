<?php

use Aaran\Website\Livewire\Class;
use Illuminate\Support\Facades\Route;

Route::get('/', Class\Home\Index::class)->name('home');
Route::get('/abouts', Class\About\Index::class)->name('abouts');
Route::get('/blogs', Class\Blog\Index::class)->name('blogs');
Route::get('/web-contacts', Class\Contact\Index::class)->name('web-contacts');
Route::get('/web-projects', Class\Project\Index::class)->name('web-projects');


Route::get('/client-registration', Class\Project\Index::class)->name('client-registration');
Route::get('/client-plans', Class\Project\Index::class)->name('client-plans');

Route::get('/dev-teams', Class\About\Team::class)->name('dev-teams');
Route::get('/client-reviews', Class\About\Review::class)->name('client-reviews');


Route::get('/plan-details', Class\Project\Plan::class)->name('plan-details');
Route::get('/client-info', Class\Project\ClientInfo::class)->name('client-info');
Route::get('/plan-comparison', Class\Project\PlanComparison::class)->name('plan-comparison');
