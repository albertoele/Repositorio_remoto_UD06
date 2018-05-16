<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      .formpeq{
        height: 500px;
        <?php
        include 'sesion.php';
        $sesion=new Sesion();
        $sesion->cambiaColor();
        ?>
      }
    </style>
    <link rel="stylesheet" href="estilos.css">
  </head>
  <body>
    <section>
      <form action="seguridad.php" method="post" class="formpeq">
        <table>
          <tr>
            <td><h2>Login</h2></td>
          </tr>
          <?php
              if ($_SESSION["error"]==true) {
                echo "<tr><td class=\"error\">" . $_SESSION["msjerror"] . "</td></tr>";
              }
          ?>
          <tr>
            <td class="izq">Usuario</td>
          </tr>
          <tr>
            <td><input type="text" name="usuario" value="<?php if (isset($_SESSION['usuarioform'])){ echo $_SESSION['usuarioform']; } ?>" required></td>
          </tr>
          <tr>
            <td class="izq">Contraseña</td>
          </tr>
          <tr>
            <td><input type="password" name="pass" required></td>
          </tr>
          <input type="hidden" name="accion" value="login">
          <tr>
            <td><input type="submit" name="" value="ENTRAR" class="boton"></td>
          </tr>
        </table>
        <?php $_SESSION["error"]=false; ?>
        <p><a href="registro.php">Registrarse</a></p>
      </form>
    </section>
  </body>
</html>
