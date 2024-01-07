<?php

use Illuminate\Routing\Router;
use App\Admin\Controllers\TestControllers;
use App\Admin\Controllers\BillSourceDataController;



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
    $router->resource('bill-source-datas', BillSourceDataController::class);
    $router->post('/bill-source-datas/csv/import',  [BillSourceDataController::class, 'importCsv']);

});



