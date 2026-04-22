composer create-project laravel/laravel crud-generator  
cd crud-generator



composer require fida/laravel-crud-generator
        or
composer require fida/pilot



php artisan pilot:config

php artisan pilot:crud Product

php artisan migrate

php artisan serve
