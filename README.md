# Warehouse Stock Management App

<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/ekayudinata/warehouse-stock-management-app/actions">
    <img src="https://github.com/ekayudinata/warehouse-stock-management-app/workflows/tests/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
</p>

## 🚀 About the Project

A comprehensive Warehouse Stock Management System built with Laravel, providing an efficient way to manage inventory, track stock movements, and handle transactions. This application features:

- Product inventory management
- Stock movement tracking
- Transaction history
- User authentication and authorization
- RESTful API endpoints
- GraphQL support
- Docker containerization

## 🛠 Prerequisites

Before you begin, ensure you have the following installed:

- [Docker](https://www.docker.com/products/docker-desktop) and Docker Compose
- [Git](https://git-scm.com/)
- [Composer](https://getcomposer.org/) (if not using Docker)
- [Node.js](https://nodejs.org/) and npm (for frontend assets)
- [PHP 8.1+](https://www.php.net/downloads.php) (if not using Docker)

## 🚀 Quick Start with Docker

1. **Clone the repository**
   ```bash
   git clone https://github.com/ekayudinata/warehouse-stock-management-app.git
   cd warehouse-stock-management-app
   ```

2. **Copy environment file**
   ```bash
   cp .env.example .env
   ```

3. **Start the Docker containers**
   ```bash
   docker-compose -f docker/warehouse-stock/docker-compose.yml up -d
   ```

4. **Install PHP dependencies**
   ```bash
   docker-compose -f docker/warehouse-stock/docker-compose.yml exec app composer install
   ```

5. **Generate application key**
   ```bash
   docker-compose -f docker/warehouse-stock/docker-compose.yml exec app php artisan key:generate
   ```

5. **Create database and user**
   ```bash
   docker-compose -f docker/warehouse-stock/docker-compose.yml exec db mysql -u root -e "CREATE DATABASE IF NOT EXISTS warehouse_stock_management_app;"
   ```

6. **Run database migrations and seeders**
   ```bash
   docker-compose -f docker/warehouse-stock/docker-compose.yml exec app php artisan migrate --seed
   ```

7. **Set storage permissions**
   ```bash
   docker-compose -f docker/warehouse-stock/docker-compose.yml exec app chown -R www-data:www-data storage bootstrap/cache
   ```

## 🔧 Manual Setup (without Docker)

1. **Clone the repository**
   ```bash
   git clone https://github.com/ekayudinata/warehouse-stock-management-app.git
   cd warehouse-stock-management-app
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Configure environment**
   - Copy `.env.example` to `.env`
   - Update database configuration in `.env`
   - Generate application key: `php artisan key:generate`

4. **Run database migrations**
   ```bash
   php artisan migrate --seed
   ```

## 🌐 Access the Application

- **Web Application**: http://localhost:8000
- **PHPMyAdmin**: http://localhost:8080
  - Username: root
  - Password: password (as defined in docker-compose.yml)

## 📚 Documentation

For detailed documentation about the application's architecture, API endpoints, and development guidelines, please refer to the [Wiki](https://github.com/ekayudinata/warehouse-stock-management-app/wiki).
