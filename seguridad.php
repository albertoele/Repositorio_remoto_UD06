<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      body{
        text-align: center;
      }
    </style>
  </head>
  <body>
    <?php

    include 'usuarios_db.php';
    include 'sesion.php';


    if (isset($_POST["accion"])) {

      $usuario= new Usuario();
      $sesion= new Sesion();
      $_SESSION['email']=$_POST["email"];
      $_SESSION['nombre']=$_POST["nombre"];
      $_SESSION['apellidos']=$_POST["apellidos"];
      $_SESSION['usuarioform']=$_POST["usuario"];
      $_SESSION["error"]=false;

      if ($_POST["accion"]=="registro") {

        if ($usuario->buscarUsuario($_POST["email"])==null) {

          if ($_POST["pass1"]==$_POST["pass2"]) {
            $_SESSION["error"]=false;
            $passcifrado=password_hash($_POST["pass1"], PASSWORD_DEFAULT);

            $resultado=$usuario->insertarUsuario($_POST["email"], $passcifrado, $_POST["nombre"], $_POST["apellidos"]);

            if ($resultado) {
              echo "<h2>Usuario registrado con éxito</h2>";
              echo "<h3><a href=\"index.php\">Ir al Login</a></h3>";
              $_SESSION["error"]=false;
            } else {
              $_SESSION["error"]=true;
              $_SESSION["msjerror"]="Revisa los datos y vuelve a intentarlo";
              ?>
              <script type="text/javascript">
              alert('Revisa los datos y vuelve a intentarlo.');
              window.location.href='registro.php';
              </script>
              <?php
            }

          } else {
            $_SESSION["error"]=true;
            $_SESSION["msjerror"]="Asegurese de que las dos contraseñas son iguales";
            ?>
            <script type="text/javascript">
            alert('Error al confirmar la contraseña!');
            window.location.href='registro.php';
            </script>
            <?php
          }

        } else {
          $_SESSION["error"]=true;
          $_SESSION["msjerror"]="El usuario introducido ya existe";
          ?>
          <script type="text/javascript">
          alert('El usuario ya existe');
          window.location.href='registro.php';
          </script>
          <?php
        }

      }elseif ($_POST["accion"]=="login") {

          $compusuario=$usuario->buscarUsuario($_POST["usuario"]);
          if ($compusuario!=null) {
            $_SESSION["error"]=false;
            foreach ($compusuario as $fila) {
              $cifrado=$fila["pass"];
            }

            if (password_verify($_POST["pass"], $cifrado)) {
              header('Location: miperfil.php');

              $sesion->addUsuario($fila["usuario"],$cifrado);

            } else {
              $_SESSION["error"]=true;
              $_SESSION["msjerror"]="La contraseña no es correcta";
              ?>
              <script type="text/javascript">
              alert('La contraseña no es correcta.');
              window.location.href='index.php';
              </script>
              <?php
            }

          } else {
            $_SESSION["error"]=true;
            $_SESSION["msjerror"]="El usuario no existe";
            ?>
            <script type="text/javascript">
            alert('El usuario no existe');
            window.location.href='index.php';
            </script>
            <?php
          }

      }elseif ($_POST["accion"]=="actualizar") {
        setcookie("color", $_POST["color"], time()+86400);
        $usuarioactualizado=$usuario->actualizarUsuario($_POST["email"], $_POST["nombre"], $_POST["apellidos"], $_POST["rol"], $_SESSION["usuario"]);
        if ($usuarioactualizado) {
          ?>
          <script type="text/javascript">
          alert('Usuario Actualizado');
          window.location.href='miperfil.php';
          </script>
          <?php
        }else {
          ?>
          <script type="text/javascript">
          alert('Se ha producido un error. Vuelve a intentarlo');
          window.location.href='miperfil.php';
          </script>
          <?php
        }

      }elseif ($_POST["accion"]=="logout") {
        $sesion->logOut();
        ?>
        <script type="text/javascript">
        alert('Cerrando sesión');
        window.location.href='index.php';
        </script>
        <?php
      }
    }
    ?>
  </body>
</html>
