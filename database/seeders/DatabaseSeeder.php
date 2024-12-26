<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            FacultySeeder::class,
            DepartmentSeeder::class,
            TeacherSeeder::class,
        ]);
        User::factory()->create([
            'name' => 'Fursov Danil',
            'email' => 'danil@fursovdanil.com',
            'password' => Hash::make('fursovroot'),
        ]);
    }
}
