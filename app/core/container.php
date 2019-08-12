<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App(['settings' => [
    'displayErrorDetails' => true,
    'responseChunkSize' => 8096]
    ]
);
//
$container=$app->getContainer();
//
$container['config']=function($container){

    return new App\Config\Config('../app/src/Config/Config.json');

};
//uncoment to add optional dependencies
$container['bigquery']=function($container){

    return function($config){

        return App\Tools\BigQueryParser::instanciate($config);

    };

};
$container['pac']=function($container){

    return function($config){

        return new App\Modules\Pac($config);

    };

};
$container['views']=function($container){

    return new \Slim\Views\Twig('../app/src/Views',['cache'=>false]);

};
//

?>