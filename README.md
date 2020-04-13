### Highload Learning homework project

https://highloadlearning.chedev.ru (_could be down, sorry, it's just a homework project_)

PHP version: `7.2`  
Web root directory: `/public`  
Routing: `/routes/routes.php`  
Controllers: `/app/Http/Controllers`  
DB migrations: `/database/migrations`

It's better to open project in PhpStorm and CTRL+Click everything interesting.

#### To start...

```
> composer install

> cp .env.example .env

> php artisan key:generate
> php artisan migrate
> php artisan optimize 
```
