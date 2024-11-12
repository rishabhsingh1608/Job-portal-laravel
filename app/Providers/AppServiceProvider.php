<?php

namespace App\Providers;

use App\Models\Employer;
use App\Models\Joblisting;
use App\Policies\EmployerPolicy;
use App\Policies\JobPolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Gate::policy(Joblisting::class, JobPolicy::class);
        Gate::policy(Employer::class, EmployerPolicy::class);
    }
}
