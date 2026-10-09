# IT0049 TFA3 Cayabyab

Four-page Point-of-Sale application extended with validated forms, edit workflows, and avatar uploads for IT0049 Technical Formative Assessment 3.

## Features

- Landing page: `/`
- About page: `/about`
- Customer Accounts page: `/customers`
- User Accounts page: `/users`
- CodeIgniter routes and controllers
- New and edit forms for customer and user accounts
- Server-side validation with preserved form values and error messages
- JPG/PNG avatar validation, 2MB limit, thumbnail preparation, and safe filename storage
- MySQL schema and sample data export in `database/pos_forms_schema.sql`
- Shared navigation and responsive styling

## Requirements

- PHP 8.1 or newer
- Composer

## Setup

1. Clone or download this repository.
2. Run `composer install`.
3. Create a MySQL database and load `database/pos_forms_schema.sql`.
4. Copy `env` to `.env`, set `app.baseURL = 'http://localhost:8080/'`, and configure the database variables.
5. Start the application with `php spark serve`.
6. Open `http://localhost:8080/`.

The Customer Accounts and User Accounts pages support create and edit workflows. The user edit form accepts JPG or PNG avatars up to 2MB, prepares a 320px thumbnail, stores it under `public/uploads`, and saves only its filename in MySQL.

## Project structure

- `app/Config/Routes.php` contains the four routes.
- `app/Controllers/` contains `Pages`, `Customers`, and `Users`.
- `app/Views/` contains the shared layout and four page views.
- `app/Models/CustomerModel.php` and `app/Models/UserModel.php` define the database models and validation rules.
- `database/pos_forms_schema.sql` creates and populates the database tables.
- `public/uploads/placeholder.svg` is used when a user has no avatar.
- `public/assets/css/style.css` contains the site styling.
