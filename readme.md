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

### Pre-requisites(before you clone the project):
You will need to have MySQL Server and a PHP interpreter already installed on you machine. You can download a standalone version of these technologies from the following links:
#### 1. MySQL Community Server
From https://dev.mysql.com/downloads/mysql/ and select the version that suits your OS.
#### 2. PHP interpreter
From http://php.net/downloads.php

#### Alternatives
You can also download a full package that contains MySQL Server, PHP and Apache server. Some of these includes: 
 - MAMP: https://www.mamp.info/en/
 - WAMP: http://www.wampserver.com/en/
 - XAMPP: https://www.apachefriends.org/index.html
 - By defaut, the project does not require to have any of these packages installed on your machine. The project runs on Nginx web server. 

#### Composer
The project requires you to have composer installed on your machine.
It is is a tool for dependency management in PHP. It allows you to declare the libraries your project depends on and it will manage (install/update) them for you. You can download a free version and read the instructions of how to install on your machine from https://getcomposer.org/doc/00-intro.md#using-the-installer.

### Cloning the project
Before you clone the project, please select the directory in which you want the project to be located at.
You can run this command to move to the desire directory:
Windows OS: cd [disk]:\[desire directory] eg cd C:\Program Files
Unix based OS: cd /[desire directory] eg cd /usr

To clone the project, run this command in the terminal/command line:
git clone https://github.com/giangpham05/dummy-redfrog.git
This will download all the required files for the project from this repo
### What's next?
Now that you have everything installed on your computer, what you need to do is the following:
#### + Run composer
Please ensure that you are in the dummy-redfrog directory. 
Run this command in the terminal/command line: "composer install"
This command will install all the dependencies for the project including the vendor folder that Laravel requires. Because the project is deployed via Github, this folder is ignored by Github by default.



