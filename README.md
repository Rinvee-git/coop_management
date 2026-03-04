## Installation

Clone the repo, go to the project folder, install dependencies with `composer install`, copy the environment file using `cp .env.example .env`, generate the app key with `php artisan key:generate`, then (if the project uses frontend assets) run `npm install` and `npm run build` (or `npm run dev` for development), configure your `.env` database settings if needed and run `php artisan migrate`, and finally start the app with `php artisan serve`.


#Install

php artisan shield:generate --all

php artisan shield:super-admin
