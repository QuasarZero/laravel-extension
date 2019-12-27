(*This is my first composer project*)

# Feature

* Support add table comment when you use Schema Facade to create table in migration script. MySQL, PostgreSQL are available now
* Make your Route Facade can find its methods

# System Requirement

* If you use **PostgreSQL** to your default database, you must ensure it's **version >= 9.0**

# Install

### composer

`composer require quasar/laravel-extension`

# Manual

Firstly, execute `php artisan quasar:init` to init the library

Secondly, update the config of app.providers, comment out `Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class`, use `Quasar\Extension\Laravel\Console\ConsoleSupportServiceProvider::class` to replace

Like
```PHP
[
  // ...
  'providers' => [
      // ...
      # 'Schema' => Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
      'Schema' => Quasar\Extension\Laravel\Console\ConsoleSupportServiceProvider::class,
      // ...
  ]
];
```

Now, all new migration files' schema use statement will specify the custom schema file of this library

For the exist migrations, you must replace the use statement to the true source manually, if you need...orz

Like

```php
# use Illuminate\Support\Facades\Schema;
use Quasar\Extension\Laravel\Database\Schema;
```



# Background

You will find these are less the functions for set table comment, when you get use the **Laravel Facade** utility of `Illuminate\Support\Facades\Schema`, and the code completion does not work when use PhpStorm to call methods of `Illuminate\Support\Facades\Route` 

For `Illuminate\Support\Facades\Schema` Our Chinese dude already published a library to achieve this demand [zedisdog/laravel-schema-extend](https://github.com/zedisdog/laravel-schema-extend)

However, it lacks support for PostgreSQL currently, although it does work well on MySQL

And then, for `Illuminate\Support\Facades\Route`, there is a helper library, [barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper)

It is a full volume helper, will generate some redundant stuffs you and I don't need  

So I prepare this package to integrate our common requirement

# Thanks

* [zedisdog](https://github.com/zedisdog)
* [barryvdh](https://github.com/barryvdh)

Thank you for your works to reference!