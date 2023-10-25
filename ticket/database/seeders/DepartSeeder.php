<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use function Laravel\Prompts\table;
use Illuminate\Support\Facades\DB;
use App\Models\Department;
class DepartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create(['name' => 'Yönetim Departmanı']);
        Department::create(['name' => 'Üretim Departmanı']);
        Department::create(['name' => 'Pazarlama Departmanı']);
        Department::create(['name' => 'Finans Departmanı']);
        Department::create(['name' => 'Muhasebe Departmanı']);
        Department::create(['name' => 'İnsan kaynakları Departmanı']);
        Department::create(['name' => 'Ar-Ge (araştırma geliştirme) Departmanı']);
        Department::create(['name' => 'Halkla ilişkiler Departmanı']);
    }
}
