<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $faculties = DB::table('faculties')->pluck('id', 'code');

        DB::table('departments')->insert([
            // FEIT
            [
                'faculty_id' => $faculties['FEIT'],
                'name' => "Кафедра комп'ютерних наук",
                'code' => 'CS',
                'description' => 'Кафедра, що охоплює теоретичні та практичні аспекти комп\'ютерних наук.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'faculty_id' => $faculties['FEIT'],
                'name' => 'Кафедра інформаційних систем і технологій',
                'code' => 'ISIT',
                'description' => 'Кафедра, присвячена інформаційним системам, базам даних та іншим ІТ-технологіям.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // FIA
            [
                'faculty_id' => $faculties['FIA'],
                'name' => 'Кафедра будівництва',
                'code' => 'KBuild',
                'description' => 'Кафедра, що готує фахівців у галузі будівництва.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'faculty_id' => $faculties['FIA'],
                'name' => 'Кафедра інженерних систем',
                'code' => 'KEngSys',
                'description' => 'Кафедра, що займається інженерними комунікаціями та системами.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // FEU
            [
                'faculty_id' => $faculties['FEU'],
                'name' => 'Кафедра економічної теорії',
                'code' => 'KEconTheory',
                'description' => 'Кафедра базових економічних дисциплін.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'faculty_id' => $faculties['FEU'],
                'name' => 'Кафедра менеджменту організацій',
                'code' => 'KManOrg',
                'description' => 'Кафедра управлінських дисциплін та організаційного розвитку.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
