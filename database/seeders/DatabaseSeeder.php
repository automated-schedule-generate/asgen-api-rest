<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Teacher;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::beginTransaction();
        try {
            User::factory()->create([
                'name' => 'test user',
                'cpf' => '12345678911',
                'email' => 'test@email.com',
                'is_cradt' => true,
                'is_den' => true,
                'is_active' => true,
                'registration' => fake()->unique()->numerify('########'),
                'function' => fake()->jobTitle(),
                'department' => fake()->word(),
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);
            $user = User::factory()->create([
                'name' => 'Juliano',
                'cpf' => '12345678913',
                'email' => 'julianus@email.com',
                'is_cradt' => false,
                'is_den' => false,
                'is_active' => true,
                'registration' => fake()->unique()->numerify('########'),
                'function' => fake()->jobTitle(),
                'department' => fake()->word(),
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);

            Teacher::factory()->create([
                'user_id' => $user->id,
                'workload' => 40,
            ]);
            DB::commit();
        } catch( \Exception $e) {
            DB::rollBack();
        }

        $this->call([
            CourseSeeder::class,
            SubjectSeeder::class,
            SchoolClassSeeder::class,
        ]);
    }
}
