<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Workshop Laravel
## 1. Clone the Project from GitHub
First, you need to clone a Laravel project from GitHub.
```bash
git clone Dancuo-Lohan/workshop-laravel
cd workshop-laravel
```
## 2. Install Dependencies with Composer
Once you have the project cloned locally, navigate into the project directory and run Composer to install the PHP dependencies specified in the `composer.json` file.
```bash
cd workshop-laravel
composer install
```
## 3. Copy .env.example to .env
Laravel uses an `.env` file to manage environment variables. You need to create this file by copying the example provided by Laravel.
```bash
cp .env.example .env
```
## 4. Database Setup and Seeding
First, ensure your database details are correctly set in the `.env` file (by default we create a `.sqlite` file for the database). Then run the migrations (which set up your database schema) and seed the database.
```bash
php artisan migrate
php artisan db:seed
```
## 5. Run the Development Server
Finally, to start the Laravel development server:
```bash
php artisan serve
```
This command will start a development server at http://localhost:8000 by default.
## 6. List of accounts
After the project setup, you can try it using multiple users:
- **Admin**
    - Email: `admin@email.fr`
    - Password: `testtest`
- **Project Manager**
    - Email: `proman@email.fr`
    - Password: `testtest`
- **Developer**
    - Email: `dev@email.fr`
    - Password: `testtest`