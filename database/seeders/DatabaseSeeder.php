<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Food;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Tambah kategori Meals jika belum ada
        $mealsCategory = Category::firstOrCreate([
            'type' => 'Meals',
        ], [
            'name' => 'Makanan Berat',
        ]);

        // Tambah menu Nasi Padang Ayam
        Food::firstOrCreate([
            'name' => 'Nasi Padang Ayam',
        ], [
            'price' => 25000,
            'image' => 'images/naspad.png',
            'category_id' => $mealsCategory->id,
            'is_popular' => true,
            'description' => 'Nasi Padang lengkap dengan lauk ayam dan sambal.'
        ]);
    }
}
