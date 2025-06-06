# Laravel Sanctum & Swagger Practice

This project is a practice implementation of **Laravel Sanctum** for API authentication and **Swagger** (via `L5-Swagger`) for auto-generated API documentation. The goal is to provide a simple yet complete setup for building and documenting secure APIs in Laravel.

## 🚀 Features

- ✅ API Authentication using **Laravel Sanctum**
- 📘 Interactive API documentation with **Swagger UI**
- 👤 User registration & login APIs
- 🔒 Protected routes requiring authentication
- 📦 Clean and modular Laravel setup

---

## 🛠️ Requirements

- PHP >= 8.1
- Composer
- Laravel >= 10
- MySQL or any supported database
- Node.js & npm (for Laravel Mix if needed)

---

## 📦 Installation

1. Clone the repository:

```bash
git clone https://github.com/Sushil113/laravel-swagger.git
cd laravel-swagger
```

2. Install PHP dependencies:

```bash
composer install
```

3. Copy the .env.example and set up your environment

```bash
cp .env.example .env
php artisan key:generate
```

4. Serve the application

```bash
php artisan serve
```

## 🔐 Sanctum Authentication and Swagger Setup

Sanctum is used for token-based API authentication.
To authenticate, users register and log in to receive a bearer token.
Use the token in the Authorization header:

```bash
Authorization: Bearer <token>
```

### 📘 Swagger Documentation Setup

1. Install L5-Swagger:

```bash
composer require "darkaonline/l5-swagger"
```
2. Publish the configuration:

```bash
php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"
```

3. Add the following code to controller.php
```bash
use OpenApi\Annotations as OA;

/**
 * @OA\Info(title="My First API", version="0.1")
 *
 * @OA\SecurityScheme(
 *     securityScheme="sanctum",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     description="Enter your bearer token in the format: Bearer {token}"
 * )
 */
```

4. Generate Swagger docs:

```bash
php artisan l5-swagger:generate
```

5. Visit Swagger UI at:

```bash
http://localhost:8000/api/documentation
```

### 📄 Example API Endpoints

- POST /api/register – Register a new user
- POST /api/login – Login and get token
- GET /api/user – Get authenticated user (Protected)
