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

        // Tambah kategori Makanan
        $makananCategory = Category::firstOrCreate([
            'type' => 'Makanan',
        ], [
            'name' => 'Makanan',
        ]);

        // Tambah kategori Lauk
        Category::firstOrCreate([
            'type' => 'Lauk',
        ], [
            'name' => 'Lauk',
        ]);

        // Tambah kategori Camilan
        Category::firstOrCreate([
            'type' => 'Camilan',
        ], [
            'name' => 'Camilan',
        ]);

        // Tambah kategori Minuman
        Category::firstOrCreate([
            'type' => 'Minuman',
        ], [
            'name' => 'Minuman',
        ]);

        // Tambah menu Nasi Padang Ayam
        Food::firstOrCreate([
            'name' => 'Nasi Padang Ayam',
        ], [
            'price' => 25000,
            'image' => 'images/naspad.png',
            'category_id' => $makananCategory->id,
            'is_popular' => true,
            'description' => 'Nasi Padang lengkap dengan lauk ayam dan sambal.'
        ]);

        // Tambah menu Nasi Rendang
        Food::firstOrCreate([
            'name' => 'Nasi Rendang',
        ], [
            'price' => 30000,
            'image' => 'images/nasi_rendang.png',
            'category_id' => $makananCategory->id,
            'is_popular' => true,
            'description' => 'Nasi dengan rendang daging sapi yang kaya rempah.'
        ]);
    }
}
