# omini
make sure docker is running

cd omini

./vendor/bin/sail up

- go into omini-laravel.test-1 container
- run
php artisan migrate
- go to http://localhost in your browser

- currently there is no validation of registering users so there is no need to seed it

Due to my son's and my illness and weekend duties I couldn't do more