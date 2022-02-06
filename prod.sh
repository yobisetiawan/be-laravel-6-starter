composer dump-autoload
php artisan migrate:fresh --force

php artisan passport:install
php artisan key:generate

php artisan db:seed