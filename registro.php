<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="estilos.css">
    <style media="screen">
    form{
      <?php
//Incluimos modificación
//Incluimos otra modificación
      include 'sesion.php';
      $sesion=new Sesion();
      $sesion->cambiaColor();
      ?>
    }
    </style>
  </head>
  <body>
    <section>
      <form action="seguridad.php" method="post" >
        <table>
          <tr>
            <td><h2>Registro</h2></td>
          </tr>
          <?php
              if ($_SESSION["error"]==true) {
                echo "<tr><td class=\"error\">" . $_SESSION["msjerror"] . "</td></tr>";
              }
          ?>
          <tr>
            <td class="izq">Email</td>
          </tr>
          <tr>
            <td><input type="email" name="email" value="<?php if (isset($_SESSION['email'])){ echo $_SESSION['email']; } ?>" required></td>
          </tr>
          <tr>
            <td class="izq">Contraseña</td>
          </tr>
          <tr>
            <td><input type="password" name="pass1" required></td>
          </tr>
          <tr>
            <td class="izq">Repetir contraseña</td>
          </tr>
          <tr>
            <td><input type="password" name="pass2" required></td>
          </tr>
          <tr>
            <td class="izq">Nombre</td>
          </tr>
          <tr>
            <td><input type="text" name="nombre" value="<?php if (isset($_SESSION['nombre'])){ echo $_SESSION['nombre']; } ?>" required></td>
          </tr>
          <tr>
            <td class="izq">Apellidos</td>
          </tr>
          <tr>
            <td><input type="text" name="apellidos" value="<?php if (isset($_SESSION['apellidos'])){ echo $_SESSION['apellidos']; } ?>" required></td>
          </tr>
          <input type="hidden" name="accion" value="registro">
          <tr>
            <td><input type="submit" value="REGISTRARSE" class="boton"></td>
          </tr>
        </table>
      </form>
    </section>
  </body>
</html>
