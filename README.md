## Farm Buddy
A Laravel-based eCommerce application is a powerful, scalable, and customizable platform built using the Laravel PHP framework. This type of application allows businesses to create and manage online stores, offering products or services to customers. Laravel’s robust features, coupled with additional eCommerce-specific functionalities, make it ideal for building sophisticated web applications.

## Prerequisites
- Php 7.3
- Mysql 8.0

## Installation

1. Clone the project

2. Install dependencies:
   ```
   composer install
   npm install
   ```

3. Set up the environment file:
   ```
   cp .env.example .env
   ```

4. Run migrations:
   ```bash
   php artisan migrate
   php artisan db:seed
   or
   php artisan migrate:refresh --seed
   ```

5. Start the development environment:
   ```
   php artisan serve
   npm run dev
   ```
