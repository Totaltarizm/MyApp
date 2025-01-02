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
            'name' => 'root',
            'email' => 'root@fursovdanil.com',
            'password' => Hash::make('root'),
        ]);

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@fursovdanil.com',
            'password' => Hash::make('root'),
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@fursovdanil.com',
            'password' => Hash::make('root'),
            'role' => 'user',
        ]);
        User::factory()->create([
            'name' => 'teacher Admin',
            'email' => 'tadmin@fursovdanil.com',
            'password' => Hash::make('root'),
            'role' => 'teacher_admin',
        ]);
    }
}
