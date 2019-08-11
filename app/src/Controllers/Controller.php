<?php

//
namespace App\Controllers;

use Psr\Container\ContainerInterface as Container;

abstract class Controller{

    //container main dependency
    protected $container;
    //app config and order by json
    protected $config;
    //mysql databases
    protected $sockets=[];
    //GCP dependencies and tools
    protected $google;
    //authentification user and sessions


    //construction using dependency inyection
    public abstract function __construct(Container $container);


}

?>