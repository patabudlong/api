<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

# Task Management API

A modern RESTful API for managing user tasks with authentication and authorization. This project provides a complete backend solution for task management applications with user authentication, CRUD operations, and comprehensive API documentation.

## Features

- **User Authentication**: Registration, login, logout with secure token-based auth
- **Task Management**: Full CRUD operations for tasks
- **User Authorization**: Users can only access their own tasks
- **API Documentation**: Modern, interactive documentation interface
- **Health Monitoring**: System health check endpoint for monitoring
- **Security**: Token-based authentication and authorization policies

## Installation

### Prerequisites
- PHP 8.1 or higher
- Composer
- MySQL 5.7 or higher

### Setup

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd task-management-api
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Environment configuration**
   ```bash
   cp .env.example .env
   # Configure your database and other settings in .env file
   ```

4. **Database setup**
   ```bash
   # Run database migrations
   php artisan migrate
   ```

5. **Start the server**
   ```bash
   php artisan serve
   ```

The API will be available at `http://localhost:8000`

## API Documentation

Visit `http://localhost:8000/api-docs` to access the interactive API documentation.

## API Endpoints

### Authentication
- `POST /api/register` - Register a new user
- `POST /api/login` - Login user
- `POST /api/logout` - Logout user (requires auth)
- `GET /api/user` - Get user profile (requires auth)

### Tasks
- `GET /api/tasks` - List all user tasks (requires auth)
- `POST /api/tasks` - Create a new task (requires auth)
- `GET /api/tasks/{id}` - Get specific task (requires auth)
- `PUT /api/tasks/{id}` - Update task (requires auth)
- `DELETE /api/tasks/{id}` - Delete task (requires auth)

### System
- `GET /api/health` - Health check endpoint

## Authentication

Include the token in the Authorization header:

```
Authorization: Bearer {your_token}
```

## Request/Response Examples

### Register User
```bash
curl -X POST http://localhost:8000/api/register \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123"
  }'
```

### Create Task
```bash
curl -X POST http://localhost:8000/api/tasks \
  -H "Authorization: Bearer {your_token}" \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
    "title": "Complete project documentation",
    "description": "Write comprehensive API documentation",
    "due_date": "2024-01-31",
    "status": "pending"
  }'
```

## Health Monitoring

The `/api/health` endpoint provides system status information:

```json
{
  "status": "healthy",
  "timestamp": "2024-01-01T12:00:00.000000Z",
  "environment": "production",
  "services": {
    "database": {
      "status": "healthy",
      "message": "Database connection successful"
    },
    "storage": {
      "status": "healthy",
      "message": "Storage is accessible"
    },
    "cache": {
      "status": "healthy",
      "message": "Cache is working"
    }
  }
}
```

## Error Handling

The API returns consistent error responses:

### Validation Error (422)
```json
{
  "message": "The given data was invalid.",
  "errors": {
    "field_name": ["Error message"]
  }
}
```

### Authentication Error (401)
```json
{
  "message": "Unauthenticated."
}
```

### Authorization Error (403)
```json
{
  "message": "This action is unauthorized."
}
```

## Security Features

- Password hashing with bcrypt
- Token-based authentication
- Authorization policies for task ownership
- Input validation and sanitization
- CORS configuration
- Rate limiting

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is open-sourced software licensed under the [MIT license](LICENSE).

## Support

For support, please open an issue in the GitHub repository or contact the development team.
