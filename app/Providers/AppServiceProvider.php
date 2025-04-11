<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
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
      Gate::define('create-job-posting', function ($user) {
        return $user->role === 'poster';
      });

      Gate::define('update-job-posting', function ($user, $jobPosting) {
          return $user->id === $jobPosting->user_id;
      });

      Gate::define('delete-job-posting', function ($user, $jobPosting) {
          return $user->id === $jobPosting->user_id;
      });
    }
}
