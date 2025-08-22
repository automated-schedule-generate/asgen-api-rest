<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\SchoolClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Adicionando classes...');
        $tsi = Course::where('name', 'LIKE', '%(TSI)%')
            ->first();

        $classesTSI = [];

        for($i = 0; $i < $tsi->total_semesters; $i++) {
            $classesTSI[] = [
                'course_id' => $tsi->id,
                'turn' => $i % 2 === 0 ? 'matutino' : 'vespertino',
                'course_semester' => $i + 1,
            ];
        }

        $adm = Course::where('name', 'LIKE', '%(ADM)%')
            ->first();

        $classesADM = [];

        for($i = 0; $i < $adm->total_semesters; $i++) {
            $classesADM[] = [
                'course_id' => $adm->id,
                'turn' => $i % 2 === 0 ? 'matutino' : 'vespertino',
                'course_semester' => $i + 1,
            ];
        }

        $ipi = Course::where('name', 'LIKE', '%(IPI)%')
            ->first();

        $classesIPI = [];

        for($i = 0; $i < $ipi->total_semesters; $i++) {
            $classesIPI[] = [
                'course_id' => $ipi->id,
                'turn' => $i % 2 === 0 ? 'matutino' : 'vespertino',
                'course_semester' => $i + 1,
            ];
        }

        $log = Course::where('name', 'LIKE', '%(LOG)%')
            ->first();

        $classesLOG = [];

        for($i = 0; $i < $log->total_semesters; $i++) {
            $classesLOG[] = [
                'course_id' => $log->id,
                'turn' => $i % 2 === 0 ? 'matutino' : 'vespertino',
                'course_semester' => $i + 1,
            ];
        }

        $tgq = Course::where('name', 'LIKE', '%(TGQIG)%')
            ->first();

        $classesTQG = [];

        for($i = 0; $i < $tgq->total_semesters; $i++) {
            $classesTQG[] = [
                'course_id' => $tgq->id,
                'turn' => $i % 2 === 0 ? 'matutino' : 'vespertino',
                'course_semester' => $i + 1,
            ];
        }

        SchoolClass::factory()->createMany([
            ...$classesTSI,
            ...$classesADM,
            ...$classesIPI,
            ...$classesLOG,
            ...$classesTQG
        ]);
        $this->command->info('classes adicionadas com sucesso!');
    }
}
