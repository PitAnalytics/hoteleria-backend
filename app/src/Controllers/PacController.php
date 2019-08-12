<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface as Container;

class PacController extends Controller{
    
    public function __construct(Container $container){

        //container instance by dependency injection
        $this->container=$container;

        //config by default
        $this->config=$this->container['config'];
        $this->bigquery=$this->container['bigquery']($this->config->google('bigquery'));
        $this->modules['pac']=$this->container['pac']($this->bigquery);
        //$this->views=$this->container['views'];


    }

    public function countByDate($request,$response,$args){

        $index=$this->modules['pac']->countByDate();
        
        //respuesta con cabeceras http
        $response1 = $response->withJson($index,201);
        $response2 = $response1
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');

    }

}

?>
