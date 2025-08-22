<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();
        try {
            $this->command->info('Iniciando disciplinas de TSI...');

            //adicionando disciplinas de TSI
            $tsi = Course::where('name', 'LIKE', '%(TSI)%')
                ->first();
            $subjectsTSI = $tsi->subjects()->createMany([
                [
                    "name" => "Programação Imperativa",
                    "workload" => 60,
                    "is_optional" => false,
                    "course_semester" => 1,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Redes de Computadores",
                    "workload" => 90,
                    "is_optional" => false,
                    "course_semester" => 1,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Cálculo para Computação",
                    "workload" => 45,
                    "is_optional" => false,
                    "course_semester" => 1,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Ética, Cidadania e Sustentabilidade",
                    "workload" => 45,
                    "is_optional" => false,
                    "course_semester" => 1,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Fundamentos de Computação para Internet",
                    "workload" => 30,
                    "is_optional" => false,
                    "course_semester" => 1,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Fundamentos do Design Digital",
                    "workload" => 45,
                    "is_optional" => false,
                    "course_semester" => 1,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Inglês I",
                    "workload" => 45,
                    "is_optional" => false,
                    "course_semester" => 1,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Introdução à Administração",
                    "workload" => 45,
                    "is_optional" => false,
                    "course_semester" => 1,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Design de Interface",
                    "workload" => 60,
                    "is_optional" => false,
                    "course_semester" => 2,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Estatística e Probabilidade",
                    "workload" => 45,
                    "is_optional" => false,
                    "course_semester" => 2,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Inglês II",
                    "workload" => 45,
                    "is_optional" => false,
                    "course_semester" => 2,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Interconexão e Serviços de Redes",
                    "workload" => 60,
                    "is_optional" => false,
                    "course_semester" => 2,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Processos Psicológicos e Interação Social",
                    "workload" => 45,
                    "is_optional" => false,
                    "course_semester" => 2,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Banco de Dados",
                    "workload" => 60,
                    "is_optional" => false,
                    "course_semester" => 2,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Desenvolvimento para Web I",
                    "workload" => 60,
                    "is_optional" => false,
                    "course_semester" => 2,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Projeto e Desenvolvimento I",
                    "workload" => 30,
                    "is_optional" => false,
                    "course_semester" => 2,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Desenvolvimento para Web II",
                    "workload" => 60,
                    "is_optional" => false,
                    "course_semester" => 3,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Design de Interação",
                    "workload" => 45,
                    "is_optional" => false,
                    "course_semester" => 3,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Inglês III",
                    "workload" => 45,
                    "is_optional" => false,
                    "course_semester" => 3,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Metodologia Científica",
                    "workload" => 45,
                    "is_optional" => false,
                    "course_semester" => 3,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Pesquisa e Análise de Comportamento",
                    "workload" => 45,
                    "is_optional" => false,
                    "course_semester" => 3,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Programação Orientada a Objetos",
                    "workload" => 60,
                    "is_optional" => false,
                    "course_semester" => 3,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Projeto e Desenvolvimento II",
                    "workload" => 30,
                    "is_optional" => false,
                    "course_semester" => 3,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Segurança de Sistema para Internet",
                    "workload" => 60,
                    "is_optional" => false,
                    "course_semester" => 3,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Administração de Sistemas Operacionais",
                    "workload" => 60,
                    "is_optional" => false,
                    "course_semester" => 4,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Algoritmos e Estruturas de Dados",
                    "workload" => 60,
                    "is_optional" => false,
                    "course_semester" => 4,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Desenvolvimento para Dispositivos Móveis",
                    "workload" => 60,
                    "is_optional" => false,
                    "course_semester" => 4,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Engenharia de Software",
                    "workload" => 45,
                    "is_optional" => false,
                    "course_semester" => 4,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Gestão de Pessoas",
                    "workload" => 45,
                    "is_optional" => false,
                    "course_semester" => 4,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Inglês IV",
                    "workload" => 30,
                    "is_optional" => false,
                    "course_semester" => 4,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Interação Humano-computador",
                    "workload" => 45,
                    "is_optional" => false,
                    "course_semester" => 4,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Projeto e Desenvolvimento III",
                    "workload" => 45,
                    "is_optional" => false,
                    "course_semester" => 4,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Sistemas Distribuídos",
                    "workload" => 60,
                    "is_optional" => false,
                    "course_semester" => 4,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Tecnologias Assistivas",
                    "workload" => 60,
                    "is_optional" => false,
                    "course_semester" => 4,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Administração Avançada de Sistemas Operacionais",
                    "workload" => 60,
                    "is_optional" => false,
                    "course_semester" => 5,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Empreendedorismo e Inovação",
                    "workload" => 45,
                    "is_optional" => false,
                    "course_semester" => 5,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Gestão de Projetos",
                    "workload" => 60,
                    "is_optional" => false,
                    "course_semester" => 5,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Inglês V",
                    "workload" => 45,
                    "is_optional" => false,
                    "course_semester" => 5,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Inteligência Artificial",
                    "workload" => 60,
                    "is_optional" => false,
                    "course_semester" => 5,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Projeto e Desenvolvimento IV",
                    "workload" => 60,
                    "is_optional" => false,
                    "course_semester" => 5,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Testes e Qualidade de Software",
                    "workload" => 60,
                    "is_optional" => false,
                    "course_semester" => 5,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Tópicos Avançados em Análise e Processamento de Dados",
                    "workload" => 60,
                    "is_optional" => false,
                    "course_semester" => 5,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Tópicos Avançados em Bancos de Dados",
                    "workload" => 60,
                    "is_optional" => false,
                    "course_semester" => 5,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Internet das Coisas",
                    "workload" => 60,
                    "is_optional" => false,
                    "course_semester" => 6,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Libras",
                    "workload" => 30,
                    "is_optional" => false,
                    "course_semester" => 6,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Recuperação de Informação",
                    "workload" => 60,
                    "is_optional" => false,
                    "course_semester" => 6,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Tópicos Avançados em Desenvolvimento Web",
                    "workload" => 60,
                    "is_optional" => false,
                    "course_semester" => 6,
                    "prerequisite_id" => null,
                ],
                [
                    "name" => "Trabalho de Conclusão de Curso",
                    "workload" => 60,
                    "is_optional" => false,
                    "course_semester" => 6,
                    "prerequisite_id" => null,
                ],
            ]);

            $subjectsTSI = $subjectsTSI->keyBY('name');

            $this->command->info('Adicionando pre-requisitos de TSI...');

            $subjectsTSI["Desenvolvimento para Web I"]->update([
                "prerequisite_id" => $subjectsTSI["Programação Imperativa"]->id
            ]);
            $subjectsTSI['Desenvolvimento para Web II']->update([
                'prerequisite_id' => $subjectsTSI['Desenvolvimento para Web I']->id
            ]);
            $subjectsTSI['Interconexão e Serviços de Redes']->update([
                'prerequisite_id' => $subjectsTSI['Redes de Computadores']->id
            ]);
            $subjectsTSI['Estatística e Probabilidade']->update([
                'prerequisite_id' => $subjectsTSI['Cálculo para Computação']->id
            ]);
            $subjectsTSI['Programação Orientada a Objetos']->update([
                'prerequisite_id' => $subjectsTSI['Programação Imperativa']->id
            ]);
            $subjectsTSI['Algoritmos e Estruturas de Dados']->update([
                'prerequisite_id' => $subjectsTSI['Programação Imperativa']->id
            ]);
            $subjectsTSI['Sistemas Distribuídos']->update([
                'prerequisite_id' => $subjectsTSI['Redes de Computadores']->id
            ]);

            $this->command->info('Finalizado disciplinas de TSI.');
            $this->command->info('Iniciando disciplinas de IPI...');

            //adicionando disciplinas de IPI
            $ipi = Course::where('name', 'LIKE', '%(IPI)%')
                ->first();
            $subjectsIPI = $ipi->subjects()
                ->createMany([
                    [
                        'name' => 'Português Instrumental',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Fundamentos da Informática',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Inglês Instrumental',
                        'workload' => 30,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Matemática Aplicada',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Rede de Computadores',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Lógica de Programação e Estrutura de Dados',
                        'workload' => 75,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Segurança do Trabalho',
                        'workload' => 30,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Sistemas Operacionais',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Segurança de Sistemas para Internet',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Banco de Dados',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Desenvolvimento para Web I',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Ética Profissional e Cidadania',
                        'workload' => 30,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Programação Orientada a Objeto',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Projeto e Prática I',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Interação Humano-Computador',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Engenharia de Software',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Implantação e Administração de Serviços Web',
                        'workload' => 75,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Desenvolvimento para Web II',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Empreendedorismo',
                        'workload' => 30,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Projeto e Prática II',
                        'workload' => 75,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null
                    ]
                ]);

            $subjectsIPI = $subjectsIPI->keyBy('name');

            $this->command->info('Adicionando pre-requisitos de IPI...');

            $subjectsIPI['Desenvolvimento para Web I']->update([
                'prerequisite_id' => $subjectsIPI['Lógica de Programação e Estrutura de Dados']->id
            ]);
            $subjectsIPI['Programação Orientada a Objeto']->update([
                'prerequisite_id' => $subjectsIPI['Lógica de Programação e Estrutura de Dados']->id
            ]);
            $subjectsIPI['Desenvolvimento para Web II']->update([
                'prerequisite_id' => $subjectsIPI['Desenvolvimento para Web I']->id
            ]);

            $this->command->info('Finalizado disciplinas de IPI.');
            $this->command->info('Iniciando disciplinas de LOG...');

            //adicionando disciplinas de LOG
            $log = Course::where('name', 'LIKE', '%(LOG)%')
                ->first();
            $log->subjects()
                ->createMany([
                    [
                        'name' => 'Ética profissional',
                        'workload' => 30,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Informática básica',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Introdução à Administração',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Introdução à Logística',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Logística Reversa e Meio Ambiente',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Matemática Básica',
                        'workload' => 30,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Metodologia Científica',
                        'workload' => 30,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Português Aplicado',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Comércio e Relações Internacionais',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Estatística Básica',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Gerenciamento e Economia de Sistemas Logísticos',
                        'workload' => 30,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Gestão de Pessoas',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Inglês Instrumental I',
                        'workload' => 30,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Legislação e Tributação em Logística',
                        'workload' => 30,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Logística de Armazenagem',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Logística de Transporte e Distribuição',
                        'workload' => 30,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Custos Logísticos',
                        'workload' => 30,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Gestão de Cadeia de Suprimentos',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Gestão de produção',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Gestão de Qualidade',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Gestão de Materiais, Estoque e Compras',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Higiene e Segurança do Trabalho',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Inglês Instrumental II',
                        'workload' => 30,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Tecnologia e Sistemas de Informação Logística',
                        'workload' => 30,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Tópicos Especiais em Logística',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null
                    ]
                ]);

            $this->command->info('Adicionando pre-requisitos de LOG...');

            $this->command->info('Finalizado disciplinas de LOG.');
            $this->command->info('Iniciando disciplinas de TGQIG...');

            //adicionando disciplinas de TGQIG
            $tgqig = Course::where('name', 'LIKE', '%(TGQIG)%')
                ->first();
            $subjectsTGQIG = $tgqig->subjects()
                ->createMany([
                    [
                        'name' => 'Língua Portuguesa Aplicada',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Fundamentos da Economia',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Fundamentos da Administração',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Ética, Cidadania e Sustentabilidade',
                        'workload' => 30,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Matemática Aplicada',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Introdução à Gestão da Qualidade',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Informática',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Metodologia Científica',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Gestão de Pessoas',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Estatística I',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Engenharia Econômica',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Gestão de Materiais e Logística',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Gestão Ambiental',
                        'workload' => 30,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Ferramentas da Qualidade',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Projeto Integrador I',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Gestão da Produção',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Gestão do Processo',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Estatística II',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Gestão de Desenvolvimento do Produto',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Gestão da Qualidade em Serviços',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Tecnologia e Sistemas de Informação Aplicados',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Projeto Integrador II',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Normatização e Certificação da Qualidade',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 4,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Metrologia',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 4,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Planejamento Estratégico',
                        'workload' => 30,
                        'is_optional' => false,
                        'course_semester' => 4,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Controle Estatístico da Qualidade',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 4,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Gestão da Inovação',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 4,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Custos de Produção',
                        'workload' => 30,
                        'is_optional' => false,
                        'course_semester' => 4,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Gestão Estratégica da Qualidade',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 4,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Metodologia da Pesquisa I',
                        'workload' => 30,
                        'is_optional' => false,
                        'course_semester' => 4,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Ergonomia, Higiene e Segurança do Trabalho',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 4,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Gestão de Projetos',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 4,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Auditoria da Qualidade',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 4,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Noções Gerais do Direito',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 4,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Empreendedorismo',
                        'workload' => 45,
                        'is_optional' => false,
                        'course_semester' => 4,
                        'prerequisite_id' => null
                    ],
                    [
                        'name' => 'Metodologia da Pesquisa II',
                        'workload' => 30,
                        'is_optional' => false,
                        'course_semester' => 4,
                        'prerequisite_id' => null,
                    ]
                ]);

            $subjectsTGQIG = $subjectsTGQIG->keyBy('name');

            $this->command->info('Adicionando pre-requisitos de TGQIG...');

            $subjectsTGQIG['Estatística II']->update([
                'prerequisite_id' => $subjectsTGQIG['Estatística I']->id
            ]);
            $subjectsTGQIG['Projeto Integrador II']->update([
                'prerequisite_id' => $subjectsTGQIG['Projeto Integrador I']->id
            ]);
            $subjectsTGQIG['Metodologia da Pesquisa II']->update([
                'prerequisite_id' => $subjectsTGQIG['Metodologia da Pesquisa I']->id
            ]);

            $this->command->info('Finalizado disciplinas de TGQIG.');
            $this->command->info('Iniciando disciplinas de ADM...');

            //adicionando disciplinas de ADM
            $adm = Course::where('name', 'LIKE', '%(ADM)%')
                ->first();
            $subjectsADM = $adm->subjects()
                ->createMany([
                    [
                        'name' => 'Comunicação Empresarial',
                        'workload' => 40,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Ética Profissional em Administração',
                        'workload' => 40,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Introdução à Administração',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Introdução à Contabilidade',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Introdução à Economia',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Matemática Aplicada à Administração',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 1,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Economia Brasileira',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Estatística Aplicada',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Introdução à Psicologia',
                        'workload' => 40,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Matemática Financeira',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Noções de Direito Público e Privado',
                        'workload' => 40,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Sociologia',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 2,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Administração e Legislação Tributária',
                        'workload' => 40,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Comportamento Organizacional',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Direito Empresarial e Trabalhista',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Gestão de Pessoas I',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Metodologia Científica',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Organização, Sistema e Método',
                        'workload' => 40,
                        'is_optional' => false,
                        'course_semester' => 3,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Contabilidade Gerencial e de Custos',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 4,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Empreendedorismo',
                        'workload' => 40,
                        'is_optional' => false,
                        'course_semester' => 4,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Finanças I',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 4,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Marketing I',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 4,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Terceiro Setor',
                        'workload' => 40,
                        'is_optional' => false,
                        'course_semester' => 4,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Tecnologia da Informação',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 4,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Administração da Produção e Operações I',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 5,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Finanças II',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 5,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Gestão da Qualidade',
                        'workload' => 40,
                        'is_optional' => false,
                        'course_semester' => 5,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Gestão de Pessoas II',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 5,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Marketing II',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 5,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Processo Gerencial',
                        'workload' => 40,
                        'is_optional' => false,
                        'course_semester' => 5,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Administração da Produção e Operações II',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 6,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Análise dos Demonstrativos Financeiros',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 6,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Gestão de Projetos',
                        'workload' => 40,
                        'is_optional' => false,
                        'course_semester' => 6,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Gestão e Inovação Tecnológica',
                        'workload' => 40,
                        'is_optional' => false,
                        'course_semester' => 6,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Logística Empresarial',
                        'workload' => 40,
                        'is_optional' => false,
                        'course_semester' => 6,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Pesquisa Operacional',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 6,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Optativa I',
                        'workload' => 40,
                        'is_optional' => true,
                        'course_semester' => 6,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Administração Estratégica',
                        'workload' => 40,
                        'is_optional' => false,
                        'course_semester' => 7,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Administração de Materiais',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 7,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Administração Pública',
                        'workload' => 40,
                        'is_optional' => false,
                        'course_semester' => 7,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Gestão Ambiental e Sustentabilidade',
                        'workload' => 40,
                        'is_optional' => false,
                        'course_semester' => 7,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Liderança',
                        'workload' => 40,
                        'is_optional' => false,
                        'course_semester' => 7,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Metodologia de Pesquisa I',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 7,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Optativa II',
                        'workload' => 40,
                        'is_optional' => true,
                        'course_semester' => 7,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Gestão de Micro e Pequenas Empresas',
                        'workload' => 40,
                        'is_optional' => false,
                        'course_semester' => 8,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Orçamento e Finanças Públicas',
                        'workload' => 40,
                        'is_optional' => false,
                        'course_semester' => 8,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Mercado de Capitais',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 8,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Metodologia de Pesquisa II',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 8,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Simulações e Estratégias Empresariais',
                        'workload' => 60,
                        'is_optional' => false,
                        'course_semester' => 8,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Sistemas de Informação',
                        'workload' => 40,
                        'is_optional' => false,
                        'course_semester' => 8,
                        'prerequisite_id' => null,
                    ],
                    [
                        'name' => 'Optativa III',
                        'workload' => 40,
                        'is_optional' => true,
                        'course_semester' => 8,
                        'prerequisite_id' => null,
                    ]
                ]);

            $subjectsADM = $subjectsADM->keyBy('name');

            $this->command->info('Adicionando pre-requisitos de ADM...');

            $subjectsADM['Economia Brasileira']->update([
                'prerequisite_id' => $subjectsADM['Introdução à Economia']->id,
            ]);
            $subjectsADM['Estatística Aplicada']->update([
                'prerequisite_id' => $subjectsADM['Matemática Aplicada à Administração']->id,
            ]);
            $subjectsADM['Direito Empresarial e Trabalhista']->update([
                'prerequisite_id' => $subjectsADM['Noções de Direito Público e Privado']->id,
            ]);
            $subjectsADM['Contabilidade Gerencial e de Custos']->update([
                'prerequisite_id' => $subjectsADM['Introdução à Contabilidade']->id,
            ]);
            $subjectsADM['Finanças I']->update([
                'prerequisite_id' => $subjectsADM['Matemática Financeira']->id,
            ]);
            $subjectsADM['Finanças II']->update([
                'prerequisite_id' => $subjectsADM['Finanças I']->id,
            ]);
            $subjectsADM['Gestão de Pessoas II']->update([
                'prerequisite_id' => $subjectsADM['Gestão de Pessoas I']->id,
            ]);
            $subjectsADM['Marketing II']->update([
                'prerequisite_id' => $subjectsADM['Marketing I']->id,
            ]);
            $subjectsADM['Administração da Produção e Operações II']->update([
                'prerequisite_id' => $subjectsADM['Administração da Produção e Operações I']->id,
            ]);
            $subjectsADM['Análise dos Demonstrativos Financeiros']->update([
                'prerequisite_id' => $subjectsADM['Introdução à Contabilidade']->id,
            ]);
            $subjectsADM['Liderança']->update([
                'prerequisite_id' => $subjectsADM['Introdução à Psicologia']->id,
            ]);
            $subjectsADM['Orçamento e Finanças Públicas']->update([
                'prerequisite_id' => $subjectsADM['Administração Pública']->id,
            ]);
            $subjectsADM['Metodologia de Pesquisa II']->update([
                'prerequisite_id' => $subjectsADM['Metodologia de Pesquisa I']->id,
            ]);
            $subjectsADM['Sistemas de Informação']->update([
                'prerequisite_id' => $subjectsADM['Tecnologia da Informação']->id,
            ]);

            $this->command->info('Finalizado disciplinas de ADM.');
            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();
        }
    }
}
