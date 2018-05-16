<?php

include "db.php";

class Usuario extends db{

  function __construct(){
    parent::__construct();
  }

  public function insertarUsuario($email, $pass, $nombre, $apellidos){
    if ($this->error==false) {
      $sql="INSERT INTO usuarios (usuario, nombre, apellidos, email, pass)
      VALUES ('" . $email . "', '" . $nombre . "', '" . $apellidos . "', '" . $email . "', '" . $pass . "')";
      $resultado=$this->hacerConsulta($sql);
      if ($resultado!=null) {
        return true;
      }else {
        return false;
      }
    } else {
        return null;
      }
  }

  public function buscarUsuario($email){
    if ($this->error==false) {
      $sql="SELECT * FROM usuarios WHERE email='" . $email . "'";
      $resultado=$this->hacerConsulta($sql);
       if ($resultado!=null) {
        $tabla=[];
        while ($fila=$resultado->fetch_assoc()) {
          $tabla[]=$fila;
        }
        return $tabla;
      } else {
        return null;
      }
    }
  }

  public function actualizarUsuario($email, $nombre, $apellidos, $rol, $emailorig){
    if ($this->error==false) {
      $sql="UPDATE usuarios SET email='" . $email . "', usuario='" . $email . "', nombre='" . $nombre . "', apellidos='" . $apellidos . "', rol='" . $rol . "' WHERE email='" . $emailorig . "'";
      $resultado=$this->hacerConsulta($sql);
      if ($resultado!=null) {
        $_SESSION["usuario"]=$email;
        return true;
      }else {
        return false;
      }
    } else {
        return null;
      }
  }

  public function listaRoles(){
    if ($this->error==false) {
      $sql="SELECT * FROM roles";
      $resultado=$this->hacerConsulta($sql);
       if ($resultado!=null) {
        $tabla=[];
        while ($fila=$resultado->fetch_assoc()) {
          $tabla[]=$fila;
        }
        return $tabla;
      } else {
        return null;
      }
    }
  }

}

?>
