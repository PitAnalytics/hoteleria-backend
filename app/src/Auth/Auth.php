<?php
/*
SIMPLE API KEY VALIDATION
*/
namespace App\Auth;

use App\Primitives\Connection as Connection;

class Auth extends Connection{

  public function validate($user,$password){

    //keywords: identity and password
    return $this->database->validate('Auth',['identity'=>'user','password'=>'password'],['identity'=>$user,'password'=>$password]);

  }

}
?>