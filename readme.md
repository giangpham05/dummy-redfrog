# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

## Instructions

### I. Pre-requisites(before you clone the project):
You will need to have MySQL Server and a PHP interpreter already installed on you machine. You can download a standalone version of these technologies from the following links:
#### 1. MySQL Community Server
From [MySQL Community Server](https://dev.mysql.com/downloads/mysql/) website and select the version that suits your OS.
#### 2. PHP interpreter
From [PHP website](http://php.net/downloads.php)

#### Alternatives
You can also download a full package that contains MySQL Server, PHP and Apache server. Some of these includes: 
 - [MAMP](https://www.mamp.info/en/)
 - [WAMP](http://www.wampserver.com/en/)
 - [XAMPP](https://www.apachefriends.org/index.html)
 - By defaut, the project does not require to have any of these packages installed on your machine. The project runs on Nginx web server. 

#### 3. Composer
The project requires you to have composer installed on your machine.
It is is a tool for dependency management in PHP. It allows you to declare the libraries your project depends on and it will manage (install/update) them for you.
You can download a free version and read the instructions of how to install on your machine from [Composer website](https://getcomposer.org/doc/00-intro.md#using-the-installer)
### II. Cloning the project
Before you clone the project, please select the directory in which you want the project to be located at.
You can run this command to move to the desire directory:

Windows OS: cd [disk]:\[desire directory] eg cd C:\Program Files

Unix based OS: cd /[desire directory] eg cd /usr

To clone the project, run this command in the terminal/command line:

git clone https://github.com/giangpham05/dummy-redfrog.git

This will download all the required files for the project from this repo

### III. What's next?
Now that you have everything installed on your computer, what you need to do is the following:
#### 1. Run composer
Please ensure that you are in the dummy-redfrog directory. 

Run this command in the terminal/command line: "composer install"

This command will install all the dependencies for the project including the vendor folder that Laravel requires. Because the project is deployed via Github, this folder is ignored by Github by default.

#### 2. Database setup
##### a) Changing the .env.example to .env
You should have a .env.example file in the dummy-refrog directory. To be able to see this file, you will need to setup your computer in a way that it can see this file. The best way to to see this file is to open the dummy-redfrog folder in a text editor like Sublime Text or Notepad++ or a power IDE like PHPStorm.

The .env.example file contains the database credentials. You will need to change the extension of this file to .env or you can create a new file called .env in the same directory and copy the content from .env.example to this file.
Change the database credentials to your local database like so: (Please ensure that you are doing this in the .env file)

----------------------------------------------------------------------------
...................

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=your_database

DB_USERNAME=user who has permission to your database, eg root

DB_PASSWORD=could be none or if you have a password, please specify it here

...................

------------------------------------------------------------------------------
##### b) Generating an encrypt/app key

You should see these lines at the beginning of the .env file:

APP_ENV=local

APP_KEY=

APP_DEBUG=true

APP_LOG_LEVEL=debug

APP_URL=http://localhost

Please run this command to generate the key: "php artisan key:generate"

##### c) Database migrations
Now that you have the database connection setup, you will need a number of tables in your database so that the application can run properly.
###### Creating tables
Please ensure that you are still in the dummy-redfrog directory. Run this command from the dummy-redfrog directory: "php artisan migrate". This command will create all required tables for the application to run.
###### Creating dummy data
Inside the dummy-redfrog/database/seeds, you should see you all the files that create the initial data for the application. An example of this is username and password to log into the application.

To create the username and password, please run the command: "php artisan db:seed". This command will create 2 users for the application

#### 3. Logging in

The default user credentials are as follows.

| Email Address           | Password | User Type |
|-------------------------|----------|-----------|
| admin@admin.com         | 123456   | Admin     |
| therapist@therapist.com | 123456   | User      |

#### 4. Starting the server
You should now have everything ready. Let's start exporing the application.

To start the server, run this command: "php artisan serve". 

This command will procude this line: Laravel development server started on http://localhost:8000/.

Please copy http://localhost:8000/ and past it in the url bar of your favorite browser. The project aimed to support IE version 10 to the lastest version, Microsoft edge, Google Chrome, Safari, Opera and Firefox




