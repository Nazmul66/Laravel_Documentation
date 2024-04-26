<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## Learn About Laravel Artisan Command Line  

| Command | Description | Links |
|      :---     |    :---     |     :---:   |
| `php artisan list` | It will show all of the laravel's artisan command list | N/A |
| `php artisan route:list -h` | When Artisan command run then add to the last `-h`, It will show all options that provide us in every artisan command line |  N/A  |
| `php artisan route:list --except-vendor` | It's mean it will show the all routes file that i've create and except the vendor routes |  N/A  |
| `php artisan route:list --path=(name_add)` |  you can find the routes into the all subRoutes  |  N/A  |


## Controller related methods define 

| Command | Description |
|      :---     |    :---     | 
| `php artisan make:controller (controller name)` |  you can create new fresh controller  | 
| `php artisan make:controller (controller name) -r` |  It will create new controller with creating resources inside controller function |


## Migration related methods define

| Command | Description |
|      :---     |    :---   |
| `php artisan make:model (model name)` |  you can create new fresh model  |
| `php artisan make:model (model name) -m` |  It will create new model with creating new migration database files |
| `php artisan make:migration create_(examples)_table` |  It will create new migration database files and always name should be `plural format` |
| `php artisan migrate` |  It will migrate database file that create into phpMyAdmin  |
| `php artisan migrate:status` |  This command will show how many database are created  |
| `php artisan migrate --force` |  This command will do forcefully migrate that database tables that can not be migrated | 
| `php artisan migrate:rollback` |  This command work for last database file migrate that created, It will undo / delete that database table `into phpMyAdmin` |
| `php artisan migrate:rollback --step=3` |  `--step=3` It's mean that last 3 database table created, It will delete that database table `into phpMyAdmin` |
| `php artisan migrate:reset` | It will clear or delete all of the database tables `into phpMyAdmin` |
| `php artisan migrate:refresh / fresh` | It will rollback / delete all database tables then it migrate automatically `into phpMyAdmin` |



## Routes parameter type define

| Command | Description | Code |
|      :---     |    :---   |    :---   |   
| `whereNumber('id')` | *It's only for numeric type can access*  | Route::get('/contact/{id}', function(string $id){ return "hello $id"; })->whereNumber('id');  |
| `whereAlpha('id')` | *It's only for String type can access and cannot add number*  | Route::get('/contact/{id}', function(string $id){ return "hello $id"; })->whereAlpha('id');  |
| `whereAlphaNumeric('id')` | *It can access string & number but special character not allow*  | Route::get('/contact/{id}', function(string $id){ return "hello $id"; })->whereAlphaNumeric('id');  |
| `whereIn('id', ["dada","boy","girl"])` | *This will access only those parameter where i we define those name*  | Route::get('/contact/{id}', function(string $id){ return "hello $id"; })->whereIn('id',["dada","boy","girl"]);  |
| `where('id', '[a-zA-Z]+')` | *It's for regular expression system*  | Route::get('/contact/{id}', function(string $id){ return "hello $id"; })->where('id', '[a-zA-Z]+');  |
| `whereNumber('id')->whereAlpha('id')` | *For multiple type define*  | Route::get('/contact/{id}', function(string $id){ return "hello $id"; })->whereNumber('id')->whereAlpha('id');  |



