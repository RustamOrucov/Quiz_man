## INSTALLATION
- Run git clone 
- Open Terminal and Run Code
```bash
    git clone https://github.com/CodeMarketing3/Quiz
```
- Run cp .env.example .env
- Create a mysql database and edit the ".env" file as you like
- Open Terminal 
```bash
    # Installing Dependencies
    composer install
    # Generate an encryption key
    php artisan key:generate
    # Running Migrations
    php artisan migrate:fresh --seed
    # Run Project
    php artisan serve
``` 

### You can use the apis.postman_collection file by importing it into Postman

