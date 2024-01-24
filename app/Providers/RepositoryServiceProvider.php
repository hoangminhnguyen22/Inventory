<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Location;
use App\Models\Department;
use App\Models\User;
use App\Models\Role;
use App\Models\Asset;
use App\Models\ModelAsset;
use App\Models\Manufactorer;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Purchase;
use App\Repositories\BaseRepositoryInterface;
use App\Repositories\Eloquents\BaseRepository;
use App\Repositories\LocationRepositoryInterface;
use App\Repositories\Eloquents\LocationRepository;
use App\Repositories\DepartmentRepositoryInterface;
use App\Repositories\Eloquents\DepartmentRepository;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\Eloquents\UserRepository;
use App\Repositories\RoleRepositoryInterface;
use App\Repositories\Eloquents\RoleRepository;
use App\Repositories\AssetRepositoryInterface;
use App\Repositories\Eloquents\AssetRepository;
use App\Repositories\ModelAssetRepositoryInterface;
use App\Repositories\Eloquents\ModelAssetRepository;
use App\Repositories\ManufactorerRepositoryInterface;
use App\Repositories\Eloquents\ManufactorerRepository;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\Eloquents\CategoryRepository;
use App\Repositories\SupplierRepositoryInterface;
use App\Repositories\Eloquents\SupplierRepository;
use App\Repositories\PurchaseRepositoryInterface;
use App\Repositories\Eloquents\PurchaseRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(LocationRepositoryInterface::class, function () 
        {
            return new LocationRepository(new Location());
        });

        $this->app->singleton(DepartmentRepositoryInterface::class, function () 
        {
            return new DepartmentRepository(new Department());
        });

        $this->app->singleton(UserRepositoryInterface::class, function () 
        {
            return new UserRepository(new User());
        });

        $this->app->singleton(RoleRepositoryInterface::class, function () 
        {
            return new RoleRepository(new Role());
        });

        $this->app->singleton(AssetRepositoryInterface::class, function () 
        {
            return new AssetRepository(new Asset());
        });

        $this->app->singleton(ModelAssetRepositoryInterface::class, function () 
        {
            return new ModelAssetRepository(new ModelAsset());
        });

        $this->app->singleton(ManufactorerRepositoryInterface::class, function () 
        {
            return new ManufactorerRepository(new Manufactorer());
        });

        $this->app->singleton(CategoryRepositoryInterface::class, function () 
        {
            return new CategoryRepository(new Category());
        });

        $this->app->singleton(SupplierRepositoryInterface::class, function () 
        {
            return new SupplierRepository(new Supplier());
        });

        $this->app->singleton(PurchaseRepositoryInterface::class, function () 
        {
            return new PurchaseRepository(new Purchase());
        });

        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
