#!/bin/sh

chmod 777 -R storage &&
/usr/bin/supervisord &&
service supervisor restart &&
/etc/init.d/cron restart &&
composer install &&
php artisan key:generate &&
php artisan migrate:fresh --seed &&
php-fpm
