<?php
session_start();
include('stock.php');

if (! isset($_REQUEST["nombre"]) ||  ! isset($_REQUEST["contrasena"])) {
   header("Location: index.php?redir=si");
} else {
   $nombreUsuario = $_REQUEST["nombre"];
   $contrasenaUsuario = $_REQUEST["contrasena"];

   if (array_key_exists($nombreUsuario, $usuarios) && 
      password_verify($contrasenaUsuario, $usuarios[$nombreUsuario])) {
      echo "<p>Autenticación correcta. Acceso concedido.</p>";

      if ($nombreUsuario == "admin") {
         echo " - ¡Hola administrador! <br> ¿Dóndo quieres ir?";
         echo "<p><a href=carritoCompra.php>Acceso al carrito</a></p>";
         echo "<p><a href=gestionStock.php>Acceso a la gestión de Stock</a></p>";
      } else {
         // Si el usuario no es admin, se le muestra un mensaje y accede al carrito de compras
         echo " - Hola Usuario!<br>";
         echo "<p><a href=carritoCompra.php>Acceder al Carrito de Compras</a></p>";
      }
      $_SESSION["authok"] = 1;
   } else {
      header("Location: index.php?redir=si");
   }
}

?>

