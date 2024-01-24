<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory\AssetFactory;
use App\Models\Asset;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Asset::factory()->count(0)
                        // ->hasLocations(1)
                        // ->hasCategories(1)
                        // ->hasPurchases(1)
                        ->create();
    }
}
