<?php

namespace App\Listeners;

use Aaran\Core\Tenant\Models\Tenant;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SetTenantIdInSession
{
    public function __construct()
    {
        //
    }

    public function handle(object $event): void
    {


        if (Auth::check()) {
            $tenant = Tenant::where('id', Auth::user()->tenant_id)->first();
        }

        if ($tenant) {
            // Store tenant ID in session
            Session::put('tenant_id', $tenant->id);
            Session::put('company_code',$tenant->software_id);
            Session::save();
        }
    }
}
