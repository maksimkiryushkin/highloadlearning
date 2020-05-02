### Highload Learning homework project

https://highloadlearning.chedev.ru (_could be down, sorry, it's just a homework project_)

PHP version: `7.2`  
Web root directory: `/public`  
Routing: `/routes/routes.php`  
Controllers: `/app/Http/Controllers`  
Views: `/resources/views`  
DB migrations: `/database/migrations`

It's better to open project in PhpStorm and CTRL+Click everything interesting

**Required NOT to use ORM for DB requests!** Just remember that. 

#### To start...

```
> composer install

> cp .env.example .env

> php artisan key:generate
> php artisan migrate
> php artisan optimize 
```

#### Helpful docs

- https://laravel.com/docs/7.x – backend
- https://getbootstrap.com/docs/4.0/getting-started/introduction/ – frontend
- https://loading.io/button/ – loading buttons

#### Credits

Background: https://unsplash.com/photos/tvleqH3p1os.

All people faces taken from https://generated.photos/. They are not real persons.