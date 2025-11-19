# PSM Business Management Platform

A comprehensive business management dashboard for import/export operations, built with Laravel, Filament, and Docker.

## Overview

This platform manages products, inventory, suppliers, clients, multi-currency wallets, and complete order-to-invoice workflows including transit tracking.

**Primary Use Case**: Importing products from international suppliers (China, Turkey, Dubai) to Algeria, managing stock, and selling to clients with full financial tracking.

## Tech Stack

- **Backend**: Laravel 11+
- **Admin Panel**: Filament 3+
- **Containerization**: Docker & Docker Compose
- **Database**: MySQL 8.0
- **Cache/Queue**: Redis
- **Web Server**: Nginx
- **PHP**: 8.2

## Features

- Multi-currency wallet management (USD, EUR, DZD, CNY, AED)
- Product & inventory tracking across multiple hubs
- Order/transit workflow management
- Client & supplier management
- Invoice generation and printing
- Loss/damage tracking
- Dashboard analytics and reporting
- Role-based access control (Super Admin, Admin, Stock Agent, View-Only)
- Multi-language support (English/Arabic)
- Dark/Light theme support

## Prerequisites

- Docker Desktop installed
- Docker Compose installed
- Git

## Installation

### 1. Clone the repository

```bash
git clone <repository-url>
cd PSM
```

### 2. Copy environment file

```bash
cp .env.example .env
```

### 3. Start Docker containers

```bash
docker-compose up -d
```

### 4. Install PHP dependencies

```bash
docker-compose exec app composer install
```

### 5. Generate application key

```bash
docker-compose exec app php artisan key:generate
```

### 6. Run database migrations

```bash
docker-compose exec app php artisan migrate
```

### 7. Seed the database with initial users

```bash
docker-compose exec app php artisan db:seed
```

### 8. Install Node dependencies and build assets

```bash
docker-compose exec app npm install
docker-compose exec app npm run build
```

### 9. Install and setup Filament

```bash
docker-compose exec app php artisan filament:install --panels
```

## Accessing the Application

- **Application URL**: http://localhost:8000
- **Admin Panel**: http://localhost:8000/admin

### Default Login Credentials

**Super Admin**
- Email: `admin@psm.com`
- Password: `password`

**Admin User**
- Email: `admin.user@psm.com`
- Password: `password`

**Stock Agent**
- Email: `stock@psm.com`
- Password: `password`

**Important**: Change these passwords immediately in production!

## Docker Services

The application runs with the following services:

- **app**: PHP 8.2-FPM with Laravel
- **nginx**: Nginx web server (port 8000)
- **mysql**: MySQL 8.0 database (port 3306)
- **redis**: Redis cache/queue (port 6379)

## Common Commands

### Start containers
```bash
docker-compose up -d
```

### Stop containers
```bash
docker-compose down
```

### View logs
```bash
docker-compose logs -f app
```

### Access app container
```bash
docker-compose exec app bash
```

### Run migrations
```bash
docker-compose exec app php artisan migrate
```

### Clear cache
```bash
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan view:clear
```

### Create a new Filament resource
```bash
docker-compose exec app php artisan make:filament-resource ResourceName --generate
```

## Development Workflow

### Making Database Changes

1. Create a new migration:
```bash
docker-compose exec app php artisan make:migration create_table_name
```

2. Edit the migration file in `database/migrations/`

3. Run the migration:
```bash
docker-compose exec app php artisan migrate
```

### Creating Filament Resources

```bash
docker-compose exec app php artisan make:filament-resource ModelName --generate
```

This will create:
- Resource class in `app/Filament/Resources/`
- List, Create, Edit pages

## Release Roadmap

### Release 1: Core Foundation (Current)
- User authentication & login
- User roles (Admin, Stock Agent)
- Basic role-based permissions
- User management
- Settings page
- Multi-language infrastructure
- Dark/Light theme toggle

### Release 2: Wallet & Product Management
- Wallet management (CRUD)
- Product management (CRUD)
- Client management (CRUD)
- Supplier management (CRUD)

### Release 3: Order Management & Transit Tracking
- Order creation wizard
- Order status management
- Stock management
- Transit receipt workflow
- Loss/damage tracking

### Release 4: Invoicing & Dashboard Analytics
- Invoice management
- Dashboard statistics
- Advanced reporting
- Multi-language full implementation
- RTL support for Arabic

## Database Schema

See `project.md` for detailed database schema and relationships.

## File Structure

```
PSM/
├── app/
│   ├── Filament/         # Filament resources, pages, widgets
│   ├── Http/             # Controllers, middleware
│   ├── Models/           # Eloquent models
│   └── Providers/        # Service providers
├── config/               # Configuration files
├── database/
│   ├── migrations/       # Database migrations
│   └── seeders/          # Database seeders
├── docker/               # Docker configuration files
├── public/               # Public assets
├── resources/            # Views, language files
├── routes/               # Route definitions
├── storage/              # Logs, cache, uploads
└── docker-compose.yml    # Docker services configuration
```

## Troubleshooting

### Permission Issues
If you encounter permission issues with storage or cache:
```bash
docker-compose exec app chmod -R 775 storage bootstrap/cache
docker-compose exec app chown -R www-data:www-data storage bootstrap/cache
```

### Database Connection Issues
Make sure the MySQL container is running:
```bash
docker-compose ps
```

If MySQL is not ready, wait a few seconds and try again.

### Clear All Caches
```bash
docker-compose exec app php artisan optimize:clear
```

## Security

- Change default passwords immediately
- Update `.env` file with secure credentials
- Never commit `.env` file to version control
- Use strong APP_KEY (generated automatically)
- Enable HTTPS in production

## License

MIT License

## Support

For issues and questions, please refer to the project documentation in `project.md`.
