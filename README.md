## Project 1

- As a user, I can register
- As a user, I can login
- As a user, I can edit my profile including my profile picture
- As a admin, I can create, read, update, delete my product data
- As a user, I can order a motorcycle product (With email summary order & using laravel queuing)
- As a user, I can see my orders (Indexing in database is a must)
- As a user, I can cancel or delete my orders (With email delete or cancel order & using laravel
queuing)
- As a user, I can export my orders to text file or excel file (xlsx, csv)
- As a developer, I want to seed my database for master data (using laravel artisan command)
- As a developer, I must create a database documentation in pdf
- As a developer, I must create readme.md file to show how to run my website application
## Installation

- Install Composer and Xampp or Nginx
- Install PHP 8.0 or Higher.

Clone Project From Github
```bash
git clone https://github.com/Marsudii/project-1-nawatech.git
```
Install Package Laravel Masuk ke foldernya project-1-nawatech

```bash
cd project-1-nawatech
composer install
```

Copy file .env.example dan ubah namanya menjadi .env dan Generate APP_KEY
```bash
cp .env.example .env
php artisan key:generate
```
Buat database baru (project-1-nawatech)
set .env configuration
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=project-1-nawatech
DB_USERNAME=root
DB_PASSWORD=
```

Set .env queue QUEUE_CONNECTION
```bash
QUEUE_CONNECTION=database
```

Set email configuration

```bash
MAIL_MAILER=smtp
MAIL_HOST=mail.carpediem-project.com
MAIL_PORT=465
MAIL_USERNAME=nawatech@carpediem-project.com
MAIL_PASSWORD=Dh%y^ZZdZNZC
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=nawatech@carpediem-project.com
```

Migrate Database from DB local
```bash
php artisan migrate
```
Seed data Database from DB local
```bash
php artisan db:seed
```
Run laravel and queue listen
```bash
php artisan serve & php artisan queue:listen
```
