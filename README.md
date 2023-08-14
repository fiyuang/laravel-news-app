<div align="center">
      <h1><br/>API News Management</h1>
     </div>


# Description
A simple API News Management with CRUD News, Comment and Basic Auth with Laravel Passport

# Features
This API developed with PHP 8.1, Laravel Framework 10.18.0
 
# Tech Used
 ![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white) ![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white) ![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white) ![Postman](https://img.shields.io/badge/Postman-FF6C37?style=for-the-badge&logo=postman&logoColor=white)
      
# Getting Start:
Before you running the program, make sure you've run this command:
- `composer install` or `composer update`
-  Rename `.env.example` to `.env`
-  Generate the app key with `php artisan key:generate`
-  Run `php artisan passport:install` to create personal access client & password grant client

### Database setup:
- Create your own database, and put the credential in env file
- Run the migration with `php artisan migrate`
- Run db seeder with `php artisan db:seed`

### Run the program
`php -S localhost:8000 -t public`

The program will run on http://localhost:8000

### Credential Account
- email: admin@mail.com
- password: Pass1234

### API Route List
| Method | URL | Description |
| ----------- | ----------- | ----------- | 
| POST | localhost:8000/login  | Login User |
| POST | localhost:8000/logout  | Logout User |
| GET | localhost:8000/news  | Get All News |
| POST | localhost:8000/news  | Create News |
| POST | localhost:8000/news/{newsUUID}  | Update Detail News |
| GET | localhost:8000/news/{newsUUID}  | Get Detail News |
| DELETE | localhost:8000/news/{newsUUID}  | Delete News |
| POST | localhost:8000/comments/{newsUUID}  | Create Comment |
 
      
<!-- </> with 💛 by readMD (https://readmd.itsvg.in) -->
