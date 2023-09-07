

## About Lektor Rent App

The Lektor Rent application allows to create, edit and delete various parts of an hypothetical rent manage website.
Users, Documents, Vehicles and Rents are related to associate each entry to another.
The application is connected with a MYSQL database to keep trace of the relationships chosen.

It is coded mostly in PHP and provide a very basic frontend, allowing to see the data essentially as possible. 


## Technical info

The platform relies on Laravel 10, written in PHP 8.2 and the project interacts with a MYSQL database. It might be compatible with PHP 7.4 due to the lacking of new PHP syntax.

Frontend is compiled with Vite, a newer alternative to Laravel Mix that keeps listening for every change on files, compiling them on live.

For the CSS, Tailwind is chosen as framework due to its easy usability and customizability.

### Technological Stacks

- HTML

- CSS

- Tailwind

- PHP 8.2

- MySQL

- Laravel 10
    
## Launching

For launching this application you need to create your local database and clone this repo from Github (https://github.com/EddieFreedome/lektor) and open with an IDE (maybe VSCode).

Go to the .env file and replace DB_NAME and PORTS to correctly connect to the database.

Launch `php artisan key:generate`.

After that, make sure you run all migrations with 
`php artisan migrate`.

Done the migrations open a terminal and execute these commands:

`composer install`

`npm install`

`npm run dev`

To run local server launch:

`php artisan serve`

You did it.


## Contributing

Thank you for considering contributing to the Lektor Rent App project! 
Just in case, le us know any major improvements we can do.

## Security Vulnerabilities

If you discover a security vulnerability within Lektor Rent App, please don't use our platform for your personal application. Really. It's for a view-only purpose.


## Team and Profiles



_EddieFreedome:_ https://github.com/EddieFreedome


## License

If you want to take as exaple our platform for your projects you can do. 

