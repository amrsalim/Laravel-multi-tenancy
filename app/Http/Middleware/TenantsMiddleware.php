<?php

namespace App\Http\Middleware;

use App\Models\Tenant;
use App\Service\Tenants;
use App\Service\TenantServcie;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TenantsMiddleware
{
    private  $tenant;
    private $domain;
    private  $database;
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();
        $tenant = Tenant::where('domain',$host)->first();
//        dd($tenant , $host);
//        $tenantService = new TenantServcie();
//        $tenantService = new TenantService();

//        TenantServcie::switchToTenant($tenant);
        DB::purge('landlord');
        DB::purge('tenant');
        \Config::set('database.connections.tenant.database' , $tenant->database);
        $this->tenant = $tenant;
        $this->domain = $tenant->domain;
        $this->database = $tenant->database;
        DB::connection('tenant')->reconnect();
        DB::setDefaultConnection('tenant');
        return $next($request);
    }
}
