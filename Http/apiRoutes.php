<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'icommercepickup'], function (Router $router) {
    
    $router->get('/', [
        'as' => 'icommercepickup.api.pickup.init',
        'uses' => 'IcommercePickupApiController@init',
    ]);

   

});