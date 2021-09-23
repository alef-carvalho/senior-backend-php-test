#!/bin/bash -e

php artisan optimize:clear
php artisan migrate:fresh --seed

# start services
supervisord -n