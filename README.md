# STEPS TO FOLLOW

clone the project
    git clone https://github.com/TAHASINVM/bookingSystem.git
cd bookingSystem
cp .env.example .env 
cofigure database credentials
php artisan key:generate
composer install
npm install
php artisan migrate
php artisan serve
