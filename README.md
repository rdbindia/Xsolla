1. git clone https://github.com/rdbindia/Xsolla.git
2. cd Xsolla/
3. composer install
4. Add your database config in the .env file. I have named the DB xsolla.
5. php artisan migrate OR phinx migrate(library for migration of DB)
6. php artisan serve. Use the ip generated to replace localhost:8000 in the project files
7. Navigate to http://localhost:8000/project/create
