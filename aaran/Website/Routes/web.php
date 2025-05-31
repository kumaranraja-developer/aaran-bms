<?php

use Aaran\Website\Livewire\Class;
use Illuminate\Support\Facades\Route;

Route::get('/', Class\Home\Index::class)->name('home');
Route::get('/abouts', Class\About\Index::class)->name('abouts');
Route::get('/blogs', Class\Blog\Index::class)->name('blogs');
Route::get('/web-contacts', Class\Contact\Index::class)->name('web-contacts');
Route::get('/web-projects', Class\Project\Index::class)->name('web-projects');

//Route::get('/client-registration', Class\Project\Index::class)->name('client-registration');
Route::get('/client-plans', Class\Project\Index::class)->name('client-plans');

Route::get('/dev-teams', Class\About\Team::class)->name('dev-teams');
Route::get('/user-profile-view/{id}', Class\About\UserProfileView::class)->name('user-profile-view');
Route::get('/testimonials', Class\About\TestimonialList::class)->name('testimonials');
Route::get('/faq', Class\Home\Faq::class)->name('faq');


Route::get('/plan-details', Class\Project\Plan::class)->name('plan-details');
Route::get('/plan-overview/{id}', Class\Project\PlanOverview::class)->name('plan-overview');
Route::get('/plan-comparison', Class\Project\PlanComparison::class)->name('plan-comparison');
//Route::get('/plan-overview/{id}', [Class\Project\PlanOverview::class, 'show'])->name('plan-overview');


//Route::get('/client-registration', Class\Contact\ClientRegister::class)->name('client-registration');
Route::get('/client-registration/{id}/{plan}/{duration}', Class\ClientRegister\ClientRegister::class)->name('client-registration');

Route::view('terms', 'website-blade::terms')->name('terms');

Route::view('policy', 'website-blade::policy')->name('policy');
