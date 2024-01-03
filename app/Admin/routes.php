<?php

use Illuminate\Routing\Router;
use App\Admin\Controllers\TestControllers;


Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('tests', TestControllers::class);
    $router->post('/tests/csv/import', [TestControllers::class, 'importCsv']);
});



