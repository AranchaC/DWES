<?php

session_start();
include('stock.php');

$nombreUsuario = $_REQUEST["nombre"];
$contrasenaUsuario = $_REQUEST["contrasena"];

if (! isset($_REQUEST["nombre"]) ||  ! isset($_REQUEST["contrasena"])) {
   header("Location: index.php?redir=si");
} else {

   if (array_key_exists($nombreUsuario, $usuarios) && 
      password_verify($contrasenaUsuario, $usuarios[$nombreUsuario])) {
      echo "<p>Autenticación correcta. Acceso concedido.</p>";

      if ($nombreUsuario == "admin") {
         /* Si el usuario es admin, se muestra:
            un mensaje.
            enlace al carrito de compras.
            enlace a la gestión de stock.
            enlace a la información de stock.
            enlace cerrar sesión.
         */
         echo "<br>¡Hola administrador! <br><br> ¿Dóndo quieres ir?";
         echo "<p><a href=carritoCompra.php>Acceso al carrito</a></p>";
         echo "<p><a href=gestionStock.php>Acceso a la gestión de Stock</a></p>";
         echo "<p><a href=infoStock.php>Acceso para ver el stock</a></p>";
         echo "<p></p><a href=\"logout.php\">Cerrar sesión</a></p>";
      } else {
         /* Si el usuario no es admin, se muestra:
            un mensaje.
            enlace al carrito de compras.
            enlace cerrar sesión:
         */
         echo "<br>¡Hola Usuario!<br>";
         echo "<p><a href=carritoCompra.php>Acceder al Carrito de Compras</a></p>";
         echo "<p></p><a href=\"logout.php\">Cerrar sesión</a></p>";
      }
      $_SESSION["authok"] = 1;
   } else {
      header("Location: index.php?redir=si");
   }
}

?>

