<?php

session_start();
include('stock.php');

$nombreUsuario = $_REQUEST["nombre"];
$contrasenaUsuario = $_REQUEST["contrasena"];

if (! isset($_REQUEST["nombre"]) ||  ! isset($_REQUEST["contrasena"])) {
   header("Location: index.php?redir=si");
} else {
   //LINEAS QUE ÚSÉ PARA DETECTAR ERROR SI FALLABA USUARIO O CONTRASEÑA, 
   //Y VERIFICAR QUÉ HABÍA ALMACENADO Y QUÉ ESTABA INTRODUCIENDO.
   // echo "usuario introd: $nombreUsuario ";
   // echo "<br>";
   // echo  "Pass introd:  $contrasenaUsuario";
   // echo "<br>";
   // echo "Contraseña almacenada: " . $usuarios[$nombreUsuario] . "<br>";
   // echo "Contraseña introducida: " . $contrasenaUsuario . "<br>";

   if (isset($usuarios[$nombreUsuario])  && 
      password_verify($contrasenaUsuario, $usuarios[$nombreUsuario])) {
      echo "<p>Autenticación correcta. Acceso concedido.</p>";

      if ($nombreUsuario == "admin") {
         echo "<br>¡Hola administrador! <br><br> ¿Dóndo quieres ir?";
         echo "<p><a href=carritoCompra.php>Acceso al carrito</a></p>";
         echo "<p><a href=gestionStock.php>Acceso a la gestión de Stock</a></p>";
         echo "<p><a href=infoStock.php>Acceso para ver el stock</a></p>";
         echo "<p></p><a href=\"logout.php\">Cerrar sesión</a></p>";
      } else {
         echo "<br>¡Hola Usuario $nombreUsuario !<br>";
         echo "<p><a href=carritoCompra.php>Acceder al Carrito de Compras</a></p>";
         echo "<p></p><a href=\"logout.php\">Cerrar sesión</a></p>";
      }
      $_SESSION["authok"] = 1;
   } elseif (! isset($usuarios[$nombreUsuario])) {
      header("Location: index.php?redir=si");
      // echo "<p>Nombre o pass incorrectos.</p>";

   } 
}

?>

