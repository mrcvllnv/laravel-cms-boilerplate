# Laravel CMS Boilerplate

## Installation

Clone the repo locally:

```sh
git clone https://github.com/mrcvllnv/laravel-cms-boilerplate.git
cd laravel-cms-boilerplate
```

Install PHP dependencies:

```sh
composer install
```

Install NPM dependencies:

```sh
npm install
```

Build assets:

```sh
npm run dev
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Create an SQLite database. You can also use another database (MySQL, Postgres), simply update your configuration accordingly.

```sh
touch database/database.sqlite
```

Run database migrations:

```sh
php artisan migrate
```

Run database seeder:

```sh
php artisan db:seed
```

Run the dev server (the output will give the address):

```sh
php artisan serve
```

You're ready to go! Visit the CMS in your browser, and login with:

- **Email:** superadmin@example.com
- **Password:** secret

## Running tests

To run the tests, run:

```sh
vendor/bin/phpunit
```
