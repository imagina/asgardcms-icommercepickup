<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/icommercepickup'], function (Router $router) {
    $router->bind('icommercepickup', function ($id) {
        return app('Modules\Icommercepickup\Repositories\IcommercePickupRepository')->find($id);
    });
    $router->get('icommercepickups', [
        'as' => 'admin.icommercepickup.icommercepickup.index',
        'uses' => 'IcommercePickupController@index',
        'middleware' => 'can:icommercepickup.icommercepickups.index'
    ]);
    $router->get('icommercepickups/create', [
        'as' => 'admin.icommercepickup.icommercepickup.create',
        'uses' => 'IcommercePickupController@create',
        'middleware' => 'can:icommercepickup.icommercepickups.create'
    ]);
    $router->post('icommercepickups', [
        'as' => 'admin.icommercepickup.icommercepickup.store',
        'uses' => 'IcommercePickupController@store',
        'middleware' => 'can:icommercepickup.icommercepickups.create'
    ]);
    $router->get('icommercepickups/{icommercepickup}/edit', [
        'as' => 'admin.icommercepickup.icommercepickup.edit',
        'uses' => 'IcommercePickupController@edit',
        'middleware' => 'can:icommercepickup.icommercepickups.edit'
    ]);
    $router->put('icommercepickups/{icommercepickup}', [
        'as' => 'admin.icommercepickup.icommercepickup.update',
        'uses' => 'IcommercePickupController@update',
        'middleware' => 'can:icommercepickup.icommercepickups.edit'
    ]);
    $router->delete('icommercepickups/{icommercepickup}', [
        'as' => 'admin.icommercepickup.icommercepickup.destroy',
        'uses' => 'IcommercePickupController@destroy',
        'middleware' => 'can:icommercepickup.icommercepickups.destroy'
    ]);
// append

});
