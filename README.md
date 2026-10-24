```bash
git clone https://github.com/larvest/laravel-things.git &&
cd laravel-things &&
composer install &&
cp .env.example .env &&
php artisan key:generate &&
php artisan migrate &&
npm install && npm run build
php artisan dev```
