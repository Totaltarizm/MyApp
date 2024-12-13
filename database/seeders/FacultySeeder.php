<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('faculties')->insert([
            [
                'name' => 'Факультет електронних та інформаційних технологій',
                'code' => 'FEIT',
                'description' => 'Факультет, що спеціалізується на електронних та ІТ-технологіях.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Факультет інженерії та архітектури',
                'code' => 'FIA',
                'description' => 'Факультет архітектурного та інженерного спрямування.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Факультет економіки та управління',
                'code' => 'FEU',
                'description' => 'Факультет економічних дисциплін, менеджменту та адміністрування.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Факультет соціальних технологій і гуманітарних наук',
                'code' => 'FSTGH',
                'description' => 'Факультет гуманітарних та соціальних наук.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Факультет права',
                'code' => 'FLaw',
                'description' => 'Факультет правових наук та юридичної практики.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
