<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::factory()->createMany([
            [
                'name' => 'Tecnologia em Sistemas para Internet (TSI)',
                'total_semesters' => 6
            ],
            [
                'name' => 'Informática para Internet (IPI)',
                'total_semesters' => 3
            ],
            [
                'name' => 'Administração (ADM)',
                'total_semesters' => 8
            ],
            [
                'name' => 'Logística (LOG)',
                'total_semesters' => 3
            ],
            [
                'name' => 'Tecnologia em Gestão da Qualidade (TGQIG)',
                'total_semesters' => 5
            ]
        ]);
    }
}
