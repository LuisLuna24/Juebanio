<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Luis Luna',
            'email' => 'eduarlun4@gmail.com',
            'password' => Hash::make('Hmcnjsa1*.'),
        ]);

        foreach (['Baño', 'Cocina', 'Jardín', 'Living', 'Textiles'] as $name) {
            Category::query()->firstOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name, 'status' => true],
            );
        }
    }
}
