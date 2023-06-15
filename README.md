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
* copy .env.example and rename .env - Copy.example to .env & setup database credentials
* run command to install newly cloned project: composer install
* php artisan key:generate
* if you have BCC bankportal databse than add db name in env and run just ( php artisan migrate ) 
* Or if you dont have BCC bankportal databse than run ( php artisan migrate ) than run ( php artisan db:seed )
* php artisan serve
* Finally hit http://127.0.0.1:8000/ in your browser, thats it. (locally)