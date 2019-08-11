<?php

//interface namespace by psr-4 and composer
namespace App\Interfaces;

//interface for observable components
interface ObservableInterface{

  public function attach(Array $obervers);
  public function detach($key);

}

?>