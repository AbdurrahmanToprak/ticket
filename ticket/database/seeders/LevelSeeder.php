<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Level;
class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Level::create(['name' => 'Çok Yüksek']);
        Level::create(['name' => 'Yüksek']);
        Level::create(['name' => 'Normal']);
        Level::create(['name' => 'Düşük']);
        Level::create(['name' => 'Çok Düşük']);
    }
}
