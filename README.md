# ASGen API REST

Sistema de Geração Automática de Horários Acadêmicos desenvolvido para o Instituto Federal de Pernambuco (IFPE).

## 📋 Sobre o Projeto

O ASGen (Academic Schedule Generator) é uma API REST desenvolvida em Laravel que permite a gestão e geração automática de horários acadêmicos para instituições de ensino. O sistema oferece funcionalidades para gerenciar cursos, disciplinas, professores, salas de aula e suas respectivas alocações, além de gerar automaticamente grades horárias otimizadas.

## 🚀 Tecnologias Utilizadas

- **Framework**: Laravel 12.x
- **Linguagem**: PHP 8.2+
- **Banco de Dados**: PostgreSQL 17
- **Containerização**: Docker & Docker Compose
- **Autenticação**: Laravel Sanctum
- **Testing**: PHPUnit
- **Email**: Sistema de verificação por código
- **Cache**: Database driver
- **Queue**: Database driver

## 🏗️ Arquitetura do Sistema

### Estrutura de Diretórios

```
asgen-api-rest/
├── app/
│   ├── Http/Controllers/     # Controllers da API REST
│   ├── Models/              # Models Eloquent
│   ├── Policies/            # Políticas de autorização
│   ├── Mail/               # Classes para envio de emails
│   ├── Events/             # Eventos do sistema
│   └── Listeners/          # Listeners para eventos
├── database/
│   ├── migrations/         # Migrações do banco de dados
│   ├── seeders/           # Seeders para popular dados
│   └── factories/         # Factories para testes
├── routes/                # Definições de rotas
├── docker/               # Configurações Docker
└── tests/               # Testes automatizados
```

### Modelos Principais

- **User**: Usuários do sistema
- **Teacher**: Professores
- **Coordinator**: Coordenadores de curso
- **Course**: Cursos
- **Subject**: Disciplinas
- **SchoolClass**: Turmas
- **Classroom**: Salas de aula
- **Semester**: Semestres letivos
- **TimetableAllocation**: Alocações de horário
- **Preference**: Preferências de professores
- **SubjectTeacher**: Relacionamento professor-disciplina

### Principais Controllers

- **TimetableGeneratorController**: Geração automática de horários
- **CourseController**: Gestão de cursos
- **TeacherController**: Gestão de professores
- **SubjectController**: Gestão de disciplinas
- **PreferenceController**: Gestão de preferências
- **ClassroomController**: Gestão de salas

## 🛠️ Instalação e Configuração

### Pré-requisitos

- Docker & Docker Compose
- Git

### Instalação Local

1. **Clone o repositório**
   ```bash
   git clone <url-do-repositorio>
   cd asgen-api-rest
   ```

2. **Configuração do ambiente**
   ```bash
   cp .env.example .env
   ```

3. **Edite as variáveis de ambiente no arquivo `.env`**
   ```env
   APP_NAME="ASGen API"
   APP_ENV=local
   APP_KEY=base64:...
   APP_DEBUG=true
   APP_URL=http://localhost
   
   # URL do microsserviço de geração de horários
   MICROSERVICE_URL=http://localhost:9000
   
   # Configurações do banco PostgreSQL
   DB_CONNECTION=pgsql
   DB_HOST=pgsql
   DB_PORT=5432
   DB_DATABASE=asgen
   DB_USERNAME=sail
   DB_PASSWORD=password
   ```

4. **Instale as dependências**
   ```bash
   docker run --rm \
       -u "$(id -u):$(id -g)" \
       -v "$(pwd):/var/www/html" \
       -w /var/www/html \
       laravelsail/php84-composer:latest \
       composer install --ignore-platform-reqs
   ```

5. **Suba os containers**
   ```bash
   ./vendor/bin/sail up -d
   ```

6. **Execute as migrações**
   ```bash
   ./vendor/bin/sail artisan migrate
   ```

7. **Gere a chave da aplicação**
   ```bash
   ./vendor/bin/sail artisan key:generate
   ```

## 🚀 Comandos de Execução

### Desenvolvimento

```bash
# Iniciar o ambiente de desenvolvimento
./vendor/bin/sail up -d

# Executar o servidor Laravel
./vendor/bin/sail artisan serve

# Executar workers de fila
./vendor/bin/sail artisan queue:work

# Comando completo de desenvolvimento (server + queue + logs + vite)
composer dev
```

### Testes

```bash
# Executar todos os testes
./vendor/bin/sail artisan test

# Ou usando o composer
composer test

# Executar testes específicos
./vendor/bin/sail artisan test --filter=NomeDoTeste
```

### Banco de Dados

```bash
# Executar migrações
./vendor/bin/sail artisan migrate

# Executar seeders
./vendor/bin/sail artisan db:seed

# Resetar banco e executar migrações
./vendor/bin/sail artisan migrate:fresh --seed

# Gerar migration
./vendor/bin/sail artisan make:migration create_nome_table
```

### Outros Comandos Úteis

```bash
# Limpar cache
./vendor/bin/sail artisan cache:clear
./vendor/bin/sail artisan config:clear
./vendor/bin/sail artisan route:clear

# Gerar documentação de API
./vendor/bin/sail artisan route:list

# Acessar container
./vendor/bin/sail shell

# Logs em tempo real
./vendor/bin/sail artisan pail
```

## 📡 Endpoints da API

### Autenticação
- `POST /api/auth/login` - Login de usuário
- `POST /api/auth/register` - Registro de usuário
- `POST /api/auth/logout` - Logout
- `POST /api/auth/verify` - Verificação por código

### Gestão de Usuários
- `GET /api/users` - Listar usuários
- `POST /api/users` - Criar usuário
- `GET /api/users/{id}` - Obter usuário
- `PUT /api/users/{id}` - Atualizar usuário
- `DELETE /api/users/{id}` - Deletar usuário

### Cursos
- `GET /api/courses` - Listar cursos
- `POST /api/courses` - Criar curso
- `GET /api/courses/{id}` - Obter curso
- `PUT /api/courses/{id}` - Atualizar curso
- `DELETE /api/courses/{id}` - Deletar curso

### Professores
- `GET /api/teachers` - Listar professores
- `POST /api/teachers` - Criar professor
- `GET /api/teachers/{id}` - Obter professor
- `PUT /api/teachers/{id}` - Atualizar professor
- `DELETE /api/teachers/{id}` - Deletar professor

### Disciplinas
- `GET /api/subjects` - Listar disciplinas
- `POST /api/subjects` - Criar disciplina
- `GET /api/subjects/{id}` - Obter disciplina
- `PUT /api/subjects/{id}` - Atualizar disciplina
- `DELETE /api/subjects/{id}` - Deletar disciplina

### Geração de Horários
- `POST /api/timetable/generate` - Gerar horário automaticamente
- `GET /api/timetable/allocations` - Listar alocações
- `POST /api/timetable/allocations` - Criar alocação manual

## 🔧 Configurações Importantes

### Integração com Microsserviço

O sistema integra com um microsserviço externo para geração de horários. Configure a URL no arquivo `.env`:

```env
MICROSERVICE_URL=http://localhost:9000
```

### Sistema de Emails

Para verificação de usuários por código:

```env
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-username
MAIL_PASSWORD=your-password
```

### Cache e Filas

```env
CACHE_STORE=database
QUEUE_CONNECTION=database
```

## 🏛️ Padrões de Código

### Controllers
- Seguem o padrão RESTful
- Utilizam Form Requests para validação
- Implementam autorização via Policies
- Retornam responses JSON estruturadas

### Models
- Utilizam Eloquent ORM
- Implementam relacionamentos apropriados
- Contêm mutators e accessors quando necessário
- Seguem convenções de nomenclatura do Laravel

### Migrations
- Versionamento adequado do banco
- Foreign keys com cascade apropriado
- Índices para performance
- Campos timestamps automáticos

### Exemplo de Controller

```php path=/home/guilherme/projects/ifpe/asgen/asgen-api-rest/app/Http/Controllers/CourseController.php start=1
<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CourseController extends Controller
{
    public function index(): JsonResponse
    {
        $courses = Course::with('semesters')->get();
        return response()->json($courses);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:courses',
        ]);

        $course = Course::create($validated);
        return response()->json($course, 201);
    }
}
```

## 🧪 Testes

### Estrutura de Testes

```
tests/
├── Feature/           # Testes de integração
├── Unit/             # Testes unitários
└── TestCase.php      # Classe base para testes
```

### Executando Testes

```bash
# Todos os testes
composer test

# Testes com coverage
./vendor/bin/sail artisan test --coverage

# Testes específicos
./vendor/bin/sail artisan test --filter=CourseTest
```

## 📊 Monitoramento e Logs

### Logs
```bash
# Logs em tempo real
./vendor/bin/sail artisan pail

# Arquivo de log
tail -f storage/logs/laravel.log
```

### Debug
- Laravel Telescope (se instalado)
- Debug Toolbar (se instalado)
- Log level configurável via `.env`

## 🚀 Deploy

### Produção com Docker

1. **Build da imagem**
   ```bash
   docker build -t asgen-api .
   ```

2. **Execute com docker-compose**
   ```bash
   docker-compose -f docker-compose.prod.yml up -d
   ```

### Comandos Pós-Deploy

```bash
# Otimizações de produção
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

# Migrações
php artisan migrate --force
```

## 🤝 Contribuição

1. Fork o projeto
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## 📝 Licença

Este projeto está licenciado sob a [MIT License](https://opensource.org/licenses/MIT).

## 🆘 Suporte

Para suporte e dúvidas:
- Abra uma issue no repositório
- Entre em contato com a equipe de desenvolvimento
- Consulte a documentação do Laravel: https://laravel.com/docs

## 🎯 Roadmap

- [ ] Implementar sistema de notificações em tempo real
- [ ] Adicionar suporte a múltiplos campi
- [ ] Implementar API para mobile
- [ ] Adicionar relatórios avançados
- [ ] Integração com sistemas acadêmicos externos

---

Desenvolvido com ❤️ pela equipe do IFPE
