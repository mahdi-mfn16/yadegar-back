# Yadegar — Backend API

RESTful API for the Yadegar memory-journaling platform, built with Laravel 10 and a modular package architecture.

---

## Tech Stack

| Layer | Technology |
|-------|-----------|
| Framework | Laravel 10 + PHP 8.2 |
| Auth | Laravel Sanctum (token-based) |
| Database | MySQL |
| Cache / Queue | Redis via Predis |
| File Storage | Custom `Uploader` facade |
| SMS | Kavenegar |
| Web Push | laravel-notification-channels/webpush |
| API Docs | Scribe |
| Dev Tools | Laravel Telescope, Log Viewer |

---

## Architecture

All domain logic lives in local Composer packages under `packages/yadegar/`. The Laravel shell (`app/`) contains no business logic — it only bootstraps the framework and registers packages.

```
yadegar-back/
├── app/                    Laravel shell — helpers.php only
├── packages/
│   └── yadegar/
│       ├── base/           Abstract base classes — no domain logic
│       ├── identities/     Auth, Users, Roles, Permissions, Family
│       ├── memory/         Memories, Folders
│       ├── filesystem/     File upload via Uploader facade
│       ├── notifications/  SMS + WebPush
│       └── tag/            Tagging (in development)
├── docker-compose.yml
├── Dockerfile
└── nginx.conf
```

### Package Internal Structure

Every package follows an identical layout:

```
{package}/
├── composer.json
├── src/
│   ├── App/
│   │   ├── Http/
│   │   │   ├── Controllers/     extend base Controller
│   │   │   ├── Requests/        Index / Store / Update per model
│   │   │   ├── Resources/       extend CompactResource or JsonResource
│   │   │   └── routes/api.php
│   │   ├── Models/
│   │   │   ├── {Model}.php      extend BaseModel
│   │   │   └── DTOs/
│   │   │       └── {Model}DTO.php    fromRequest() + fromModel()
│   │   ├── Repositories/
│   │   │   ├── Interfaces/{Model}RepositoryInterface.php
│   │   │   └── {Model}Repository.php
│   │   ├── Services/
│   │   │   └── {Model}Service.php
│   │   ├── Scopes/{Model}/      Filter / Sort / Search / Load
│   │   └── Policies/
│   ├── Providers/
│   │   ├── {Package}ServiceProvider.php
│   │   └── RepositoryServiceProvider.php
│   └── config/{Package}Config.php
└── database/migrations/
```

### Layer Responsibilities

| Layer | Responsibility |
|-------|---------------|
| Controller | Receive request → call service → return response. No business logic. |
| Service | All business logic. Calls repository only — no direct Eloquent. |
| Repository | Data access layer. Eloquent queries only — no business logic. |
| DTO | Carries validated data between layers. Never `$request->all()` into `create()`. |
| Scope | Filter / Sort / Search / Load — applied via `request()` inputs. |
| Policy | Authorization — called with `Gate::authorize()` in controllers. |

---

## API Reference

All routes are versioned and prefixed per package config. Protected routes require `Authorization: Bearer {token}`.

### Auth & Identities

| Method | Path | Auth | Description |
|--------|------|:----:|-------------|
| GET | `/api/v1/auth/send-code` | — | Send OTP to phone number |
| POST | `/api/v1/auth/check-code` | — | Verify OTP and receive Sanctum token |
| GET | `/api/v1/auth/logout` | ✓ | Invalidate current token |
| GET | `/api/v1/users` | ✓ | List users |
| GET | `/api/v1/users/profile` | ✓ | Get authenticated user info |
| PUT | `/api/v1/users/{id}` | ✓ | Update own profile |
| GET | `/api/v1/families/list` | ✓ | Get family circle members |
| POST | `/api/v1/families/invite` | ✓ | Invite someone to family |
| PUT | `/api/v1/families/join` | ✓ | Accept a family invitation |
| PUT | `/api/v1/families/{family}` | ✓ | Update a member's settings |
| DELETE | `/api/v1/families/remove` | ✓ | Remove a member from family |

### Memory & Folders

| Method | Path | Auth | Description |
|--------|------|:----:|-------------|
| GET | `/api/v1/memories` | — | Public memories (Explore feed) |
| GET | `/api/v1/memories/family` | ✓ | Family circle memories |
| GET | `/api/v1/memories/myself` | ✓ | Own memories |
| GET | `/api/v1/memories/{id}` | ✓ | Single memory |
| POST | `/api/v1/memories` | ✓ | Create memory |
| PUT | `/api/v1/memories/{id}` | ✓ | Update memory |
| DELETE | `/api/v1/memories/{id}` | ✓ | Delete memory |
| GET | `/api/v1/folders/myself` | ✓ | Get own folders |
| GET | `/api/v1/folders/{id}` | ✓ | Single folder |
| POST | `/api/v1/folders` | ✓ | Create folder |
| PUT | `/api/v1/folders/{id}` | ✓ | Update folder |
| DELETE | `/api/v1/folders/{id}` | ✓ | Delete folder |

### Response Shape

```jsonc
// Collection
{ "error": false, "data": { "items": [ ... ] } }

// Single item
{ "error": false, "data": { "item": { ... } } }

// Success with no body
{ "error": false, "data": {} }

// Error
{ "error": true, "message": "Unauthenticated." }
```

---

## Getting Started

### Prerequisites

- Docker + Docker Compose
- A shared external Docker network named `shared_net`

```bash
docker network create shared_net
```

### Setup

```bash
# 1. Copy environment file
cp .env.example .env

# 2. Start containers
docker compose up -d

# 3. Install PHP dependencies (first run only)
docker exec yadegar_app composer install

# 4. Generate application key
docker exec yadegar_app php artisan key:generate

# 5. Run migrations
docker exec yadegar_app php artisan migrate --seed
```

The API will be available at **`http://localhost:8002`**.

### Key Environment Variables

| Variable | Description |
|----------|-------------|
| `APP_KEY` | Generated by `artisan key:generate` |
| `DB_HOST` | MySQL host |
| `DB_DATABASE` | Database name |
| `DB_USERNAME` / `DB_PASSWORD` | MySQL credentials |
| `REDIS_HOST` | Redis host |
| `SANCTUM_STATEFUL_DOMAINS` | Allowed frontend domains |
| `KAVENEGAR_APIKEY` | SMS gateway API key |

---

## File Uploads

Files go through the `Uploader` facade from the `filesystem` package. The Docker image allows uploads up to **40 MB**.

```php
// On create
Uploader::fileable($model)
    ->file($request->file('photo'))
    ->type('photo')
    ->dir('memory')
    ->alt('...')
    ->upload();

// On update (replaces the existing file)
Uploader::model($existingFile)
    ->fileable($model)
    ->file($request->file('photo'))
    ->type('photo')
    ->dir('memory')
    ->alt('...')
    ->upload();
```

Multi-step operations (model create + file upload) must be wrapped in `DB::beginTransaction()`.

---

## Development Tools

| Tool | URL | Purpose |
|------|-----|---------|
| Laravel Telescope | `/telescope` | Request / query / job inspector |
| Log Viewer | `/log-viewer` | Structured log browser |
| Scribe | `php artisan scribe:generate` | Auto-generate API documentation |

---

## License

MIT
