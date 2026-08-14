<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Season;
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

        foreach (['Juego de baño', 'Toallero', 'Sublimación', 'Fundas', 'Stickers y calcomanias'] as $name) {
            Category::query()->firstOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name, 'status' => true],
            );
        }

        foreach (['Sin temporada', 'Halloween', 'Navidad'] as $name) {
            Season::query()->firstOrCreate(
                ['name' => $name, 'status' => true],
            );
        }
    }
}
