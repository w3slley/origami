<?php

Class Test {
  private $name;
  private $age;


  public function getName(){
    return $this->name;
  }

  public function setName($name){
    $this->name = $name;
    return True;
  }
}
session_start();
$class = new Test;
$class->setName('Weslley');
echo $class->getName();

include_once 'User.php';
$user = new User;
echo $user->setUserLogged($_SESSION['id']);
