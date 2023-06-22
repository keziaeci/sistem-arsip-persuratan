<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\UserRolePermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserRolePermissionSeeder::class);

        Category::factory()->create([
            'name' => 'Surat Masuk'
        ]);

        Category::factory()->create([
            'name' => 'Surat Keluar'
        ]);
    }
}
