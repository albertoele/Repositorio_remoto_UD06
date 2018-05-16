<?php

class Sesion{

  private $usuario=null;

  function __construct(){

    session_start();
    if(isset($_SESSION["usuario"])){
       $this->usuario=$_SESSION["usuario"];
    }
  }

  public function getUsuario(){
    return $this->usuario;
  }

  public function addUsuario($usuario,$pass){

    $_SESSION["usuario"]=$usuario;
    $this->usuario=$usuario;

  }

  public function logOut(){
    $_SESSION=[];
    session_destroy();
  }

  public function cambiaColor(){
    if (isset($_COOKIE["color"])) {
      echo "background-color: " . $_COOKIE["color"] . ";";
    }
  }

}
 ?>
