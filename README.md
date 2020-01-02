(*This is my first composer project*)

# Feature

* Support add table comment when you use Schema Facade to create table in migration script. MySQL, PostgreSQL are available now.
* Make some Facades and objects can find their methods.
* Add database native message resolver.
* Add print function for database execute sql.


# System Requirement

* If you use **PostgreSQL** to your default database, you must ensure it's **version >= 9.0**.


# Install

### composer

`composer require quasar/laravel-extension`

# Manual

Firstly, update the config of app.providers, comment out `Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class`, use `Quasar\Extension\Laravel\Console\ConsoleSupportServiceProvider::class` to replace.

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

Second, execute `php artisan quasar:init` to init the library.

Now, all new migration files' schema use statement will specify the custom schema file of this library.

For the exist migrations, you must replace the use statement to the true source manually, if you need...orz

Like

```php
# use Illuminate\Support\Facades\Schema;
use Quasar\Extension\Laravel\Database\Schema;
```

When QueryException throw some native database exception message, you can `\Quasar\Extension\Laravel\Database\MessageResolver::handle($exception->getMessage()`, the handle method will return humanized output in my design. And default, I don't integrate the handler, you must make handler implement the interface `Quasar\Extension\Laravel\Database\MessageResolveHandler`.

If you want to check the execute sql when use ORM methods, please call `dump_sql()` function before run the ORM methods. Of course, please register the `Quasar\Extension\Laravel\Listener\DatabaseExecuteListener::class` to the **listen** property on the service provider of `App\Providers\EventServiceProvider`, before you do it. 

Like

```php
dump_sql();
UserModel::where('id', '=', 1)->get();
```

# Background

You will find these are less the functions for set table comment, when you get use the **Laravel Facade** utility of `Illuminate\Support\Facades\Schema`.

For `Illuminate\Support\Facades\Schema` Our Chinese dude already published a library to achieve this demand [zedisdog/laravel-schema-extend](https://github.com/zedisdog/laravel-schema-extend).

However, it lacks support for PostgreSQL currently, although it does work well on MySQL.

So I prepare this package to integrate our common requirement.


# Thanks

* [zedisdog](https://github.com/zedisdog)
* [barryvdh](https://github.com/barryvdh)

Thank you for your works to reference!