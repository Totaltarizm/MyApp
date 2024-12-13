<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $departments = DB::table('departments')->pluck('id', 'code');

        DB::table('teachers')->insert([
            // CS
            [
                'department_id' => $departments['CS'],
                'first_name' => 'Іван',
                'last_name' => 'Іванов',
                'patronymic' => 'Петрович',
                'position' => 'Доцент',
                'email' => 'ivanov@cs.chpu.edu.ua',
                'phone' => '380501234567',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => $departments['CS'],
                'first_name' => 'Марія',
                'last_name' => 'Петрова',
                'patronymic' => 'Іванівна',
                'position' => 'Старший викладач',
                'email' => 'petrova@cs.chpu.edu.ua',
                'phone' => '380501234568',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // ISIT
            [
                'department_id' => $departments['ISIT'],
                'first_name' => 'Олег',
                'last_name' => 'Сидоренко',
                'patronymic' => 'Миколайович',
                'position' => 'Доцент',
                'email' => 'sydorenko@isit.chpu.edu.ua',
                'phone' => '380501234569',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => $departments['ISIT'],
                'first_name' => 'Оксана',
                'last_name' => 'Гаврилюк',
                'patronymic' => 'Владиславівна',
                'position' => 'Асистент',
                'email' => 'havryliuk@isit.chpu.edu.ua',
                'phone' => '380501234570',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // KBuild
            [
                'department_id' => $departments['KBuild'],
                'first_name' => 'Дмитро',
                'last_name' => 'Шевченко',
                'patronymic' => 'Андрійович',
                'position' => 'Доцент',
                'email' => 'shevchenko@kbuild.chpu.edu.ua',
                'phone' => '380501234571',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => $departments['KBuild'],
                'first_name' => 'Тетяна',
                'last_name' => 'Коваль',
                'patronymic' => 'Олександрівна',
                'position' => 'Старший викладач',
                'email' => 'koval@kbuild.chpu.edu.ua',
                'phone' => '380501234572',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // KManOrg (для примера еще пара преподавателей)
            [
                'department_id' => $departments['KManOrg'],
                'first_name' => 'Микола',
                'last_name' => 'Гринько',
                'patronymic' => 'Васильович',
                'position' => 'Професор',
                'email' => 'grynko@kmanorg.chpu.edu.ua',
                'phone' => '380501234573',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => $departments['KManOrg'],
                'first_name' => 'Олена',
                'last_name' => 'Романенко',
                'patronymic' => 'Миколаївна',
                'position' => 'Доцент',
                'email' => 'romanenko@kmanorg.chpu.edu.ua',
                'phone' => '380501234574',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
