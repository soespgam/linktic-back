<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## Descripcion del proyecto

Este proyecto esta divido en dos partes 
- back-end desarrollado en php -laravel (linktic-back)
- Front-end desarrollado en Angular (linktic-Front)

## Migracion de tablas y creacion de seeder

para este proyecto se crearon 3 tablas (users,companies y employee) por medio de migraciones, para ello se ejecuta el comando php artisan migrate.

Tambien se creo un seeder en el cual se deja los datos de prueba de un usuario admin para la ejecucion del seeder , posterior a la ejecucion de la migracion se ejecuta php artisan db:seed

## Conexion a Base de datos Local
para la conexion del proyecto a una base de datos local , se debe tener instalado un servidor web local como xampp o wamp , posterior se crea la bd en el administrados we de base de datos por ejemplo en el caso de xampp phpmyadmin 

posterior se configura en el archivo .env 

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE= "nombreBaseDeDatos"

DB_USERNAME=root

DB_PASSWORD=

## Compilacion de proyecto Back
para la compilacion de esta parte del proyecto se usa el comando
php a rtisan serve , le cual se debe ejecutar posterior a las migraciones y seeder
