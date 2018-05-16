<?php
include 'sesion.php';
include 'usuarios_db.php';

$sesion=new Sesion();

if($sesion->getUsuario()==null){
  header('Location: index.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="estilos.css">
    <style media="screen">
      form{
        <?php $sesion->cambiaColor();?>
      }
    </style>
  </head>
  <body>
    <section>
      <form action="seguridad.php" method="post">
        <table>
            <h3>Bienvenido <?php echo $sesion->getUsuario(); ?>
          <tr>
            <td class="izq">Email</td>
          </tr>
          <tr>
            <td><input type="email" name="email" value="<?php echo $sesion->getUsuario(); ?>"></td>
          </tr>
          <tr>
            <td class="izq">Nombre</td>
          </tr>
          <tr>
            <td><input type="text" name="nombre"></td>
          </tr>
          <tr>
            <td class="izq">Apellidos</td>
          </tr>
          <tr>
            <td><input type="text" name="apellidos"></td>
          </tr>
          <tr>
            <td>Roles</td>
          </tr>
          <tr>
                <?php

                $usuario=new Usuario();

                $resultado=$usuario->listaRoles();

                echo "<td><select name=\"rol\">";

                foreach ($resultado as $fila) {
                  echo "<option value=\"" . $fila["rol"] . "\">" . $fila["rol"] . "</option>";
                }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <select name="color">
                <option value="#188ce0">Azul</option>
                <option value="#e76b55">Rojo</option>
                <option value="#67e9af">Verde</option>
                <option value="#fff">Blanco</option>
              </select>
            </td>
          </tr>
          <input type="hidden" name="accion" value="actualizar">
          <tr>
            <td><input type="submit" value="ACTUALIZAR" class="boton"></td>
          </tr>
          </form>
          <form class="" action="seguridad.php" method="post">
            <input type="hidden" name="accion" value="logout">
            <tr>
              <td><input type="submit" value="Cerrar Sesión" class="boton"></td>
            </tr>
          </form>
        </table>

    </section>
  </body>
</html>
