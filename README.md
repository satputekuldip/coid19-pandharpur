#COVID-19 Pandharpur

##About
This app has ability to manage new comers in pandharpur and manage their quarantine status

## Requirement

- php 7.2
- composer
- git 



## Installation

```
git clone https://github.com/satputekuldip/coid19-pandharpur.git

cd covid19-pandharpur

composer install

cp .env.example .env

```

Change your Database Details in ```.env``` file

```DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=covid19_pandharpur
DB_USERNAME=root
DB_PASSWORD=
```
Then initiate migration to database
```
php artisan migrate
```
