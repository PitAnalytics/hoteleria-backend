<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface as Container;

class TestController extends Controller{
    
    //mandamos llamar modulos de testing
    private $test;
    private $test1;

    //mandamos llamar dependencias del container
    public function __construct(Container $container){

        //container yn sus dependencias
        $this->container=$container;
        $this->config=$this->container['config'];

    }

    //probamos argumentos
    public function echo($request,$response,$args){

        //
        echo("wellcome ".$args['name']);

    }

    //hola mundo
    public function wellcome($request,$response,$args){

        //
        echo('wellcome');

    }

}

?>