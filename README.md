# COVID-19 Pandharpur

## About
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

## License
```
   Copyright (C) 2020 Kuldip Satpute

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
```
