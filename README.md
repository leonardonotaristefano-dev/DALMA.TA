per matteo:
git pull 
(public storage media - php artisan storage:link)
php artisan migrate
php artisan app:make-user-revisor -tuamail-



collegare il .env a riga 50 con il proprio mailTrap:
 esempio
 MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=codicediMailTrap
MAIL_PASSWORD=codicediMailTrap

composer require laravel/scout

aggiungi in env e in env.example:
SCOUT_DRIVER=tntsearch

php artisan scout:flush "App\Models\Article"
php artisan scout:import "App\Models\Article"

in gitignore:
(riga 1)
/storage/*.index
