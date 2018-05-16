<?php

class db{

  private $host="localhost";
  private $user="root";
  private $passwd="admin";
  private $bdname="login";

  private $conexion;
  private $error=false;

  function __construct(){
    $this->conexion=new mysqli($this->host, $this->user, $this->passwd, $this->bdname);
    if ($this->conexion->connect_errno){
      $this->error=true;
    }
  }

  public function estadoConexion(){
    if ($this->error) {
      return "Lo sentimos, la conexión ha fallado.";
    } else {
      return "Conexión exitosa con base de datos.";
    }
  }

  public function hacerConsulta($sql){
    if ($this->error==false) {
      $resultado=$this->conexion->query($sql);
      return $resultado;
    } else {
      return null;
    }
  }



}
?>
