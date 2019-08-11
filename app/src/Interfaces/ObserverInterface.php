<?php

//interface namespace by psr-4 and composer
namespace App\Interfaces;

//interface to oberve
interface ObserverInterface{

  public function observe($event);

}

?>