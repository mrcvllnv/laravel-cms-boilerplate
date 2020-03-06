<?php
namespace App\Providers;

use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\OrganizationRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\OrganizationRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any repository services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(OrganizationRepositoryInterface::class, OrganizationRepository::class);
    }
}
