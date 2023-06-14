## Table of contents
* [General info](#general-info)
* [Technologies](#technologies)
* [Launch](#launch)

## General info
Denefit Dashboard

## Technologies
* Denefit Dashboard is built with Laravel 8.83.27 & php 7.4.12
* Blade template

## Launch
* clone project
* delete composer.lock file from root
* copy .env.example and rename .env.example-copy to .env & setup database credentials
* Conect BCC bankportal Database to CRM
* run command to install newly cloned project: composer install
* php artisan key:generate
* php artisan migrate
* php artisan db:seed
* php artisan serve
* Finally hit http://127.0.0.1:8000/ in your browser, thats it. (locally)