<?php

namespace Aaran\Website\Providers;

use Aaran\Website\Livewire\Class\About;
use Aaran\Website\Livewire\Class\Admin\FaqManager;
use Aaran\Website\Livewire\Class\Contact;
use Aaran\Website\Livewire\Class\Faq;
use Aaran\Website\Livewire\Class\Project\BillBook;
use Aaran\Website\Models;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class WebsiteServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(WebsiteRouteProvider::class);
    }

    public function boot()
    {
        $this->registerViews();

        $this->registerMigrations();

        Livewire::component('website::testimonial', About\TestimonialList::class);
        Livewire::component('contact-form', \Aaran\Website\Livewire\Class\Contact\Index::class);

        Livewire::component('website::about.team', About\Team::class);
        Livewire::component('website::about.user-profile-view', About\UserProfileView::class);

        Livewire::component('website::bill-book', BillBook::class);

        Livewire::component('website::blade.faq', Faq\FaqList::class);
        Livewire::component('website::faq.faq-list', Faq\FaqList::class);
        Livewire::component('website::views.admin.faq-manager', FaqManager::class);
        Livewire::component('website::client-register', \Aaran\Website\Livewire\Class\ClientRegister\ClientRegister::class);
        Livewire::component('website::project.plan-overview', Aaran\Website\Livewire\Class\Project\PlanOverview::class);
    }

    private function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../Livewire/Views', 'website');

        $this->loadViewsFrom(__DIR__ . '/../Blade', 'website-blade');
    }

    private function registerMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

}
