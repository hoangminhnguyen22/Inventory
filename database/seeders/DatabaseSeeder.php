<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // AssetSeeder::class,
            // RoleSeeder::class,
            // LocationSeeder::class,
            // UserSeeder::class,
            // ManufactorerSeeder::class,
            // PurchaseSeeder::class,
        ]);

        // DB::table('permissions')->insert([
        //     ['name' => 'view_user'],
        //     ['name' => 'update_user'],
        //     ['name' => 'delete_user'],
        //     ['name' => 'create_user'],
        // ]);

        // DB::table('permission_role')->insert([
        //     ['permisison_id' => 6, 'role_id' => 2],
        //     ['permisison_id' => 7, 'role_id' => 2],
        //     ['permisison_id' => 8, 'role_id' => 2],
        //     ['permisison_id' => 9, 'role_id' => 2],
        // ]);
    }
}
