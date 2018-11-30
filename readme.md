# Installation
 - composer update
 - rename .env.example with .env
 - php artisan key:generate
 - make a new database on your server
 - adjust database credentials on .env
 - php artisan migrate:fresh --seed
 - php artisan serve
 - run and then access 127.0.0.1:8000 in your browser
