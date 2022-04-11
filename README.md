1. git clone https://github.com/rdbindia/Xsolla.git
2. cd Xsolla/
3. composer install
4. Add your database config in the .env file. I have named the DB xsolla.
5. php artisan migrate OR vendor/bin/phinx migrate(library for migration of DB)
6. Run php artisan db:seed to run faker to add data into the database table.
7. php artisan serve. Use the ip generated to replace localhost in the .env file for APP_URL
8. Navigate to <APP URL> to access the project table.

FOR PHPUnit test:
1. Run `php artisan test` to run tests.
