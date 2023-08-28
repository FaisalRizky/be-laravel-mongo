## Laravel 8 Project Setup with MongoDB

### About the App

This is a sample Laravel 8 project with MongoDB integration and JWT authentication. It showcases how to set up a Laravel application with a MongoDB database and secure API endpoints using JSON Web Tokens (JWT).


https://github.com/FaisalRizky/be-laravel-mongo/assets/25649669/aa239494-41c0-4a2d-a3f9-3122a39b3432


The application features include:

- User registration and authentication using JWT.
- Vehicle and Transaction models to demonstrate MongoDB integration.
- API endpoints for listing vehicles and transactions, with optional filters.
- API endpoint for creating vehicle transactions.

### Prerequisites

Before you begin, ensure you have the following prerequisites:

- PHP 8 installed on your system.
- The MongoDB PHP driver installed.
- Composer globally installed on your system.
- MongoDB running locally or a cloud-based MongoDB service.

### Steps

1. Clone the repository:
   ```bash
   git clone https://github.com/FaisalRizky/be-laravel-mongo
   cd be-laravel-mongo
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Copy `.env.example` to `.env` and configure the MongoDB connection:
   ```bash
   cp .env.example .env
   ```
   Update the following lines in `.env`:
   ```dotenv
   DB_CONNECTION=mongodb
   DB_HOST=127.0.0.1
   DB_PORT=27017
   DB_DATABASE=your-database-name
   ```

4. Generate an application key:
   ```bash
   php artisan key:generate
   ```
5. Publish the JWT configuration:
   ```bash
     php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
   ```
6. Seed the database:
   ```bash
   php artisan db:seed
   ```

7. Run tests:
   ```bash
   php artisan test
   ```
    <img width="578" alt="image" src="https://github.com/FaisalRizky/be-laravel-mongo/assets/25649669/f6266852-d451-4337-8e46-1fecd433fde7">


### To Run

To run the application locally, you can use the built-in PHP development server:

```bash
php artisan serve
```

This will start the development server, and you can access the application by visiting `http://localhost:8000` in your web browser.


### MongoDB Setup

If you're using a cloud-based MongoDB service, you may need to set up the connection configuration.

1. In your `.env` file, add your MongoDB connection details:
   ```dotenv
        DB_CONNECTION=mongodb
        DB_HOST=localhost
        DB_PORT=27017
        DB_DATABASE="automotive"
   ```

2. Save your changes.
