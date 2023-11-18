<?php

session_start();
include('stock.php');

//creo variables para almacenar el usuario y contraseñas introducidas:
$nombreUsuario = $_REQUEST["nombre"];
$contrasenaUsuario = $_REQUEST["contrasena"];

// Si no hay datos proporcionados, se redirige con un encabezado 'Location' a 
//la página index.php con un indicador de redirección.
if (! isset($_REQUEST["nombre"]) ||  ! isset($_REQUEST["contrasena"])) {
   header("Location: index.php?redir=si");
} else {
   //comparo si el nombreUsuario está dentro dentro del array usuarios (de la clave):
   if (array_key_exists($nombreUsuario, $usuarios) && 
      //y comparo si la contrasenaUsuario se encuentra dentro del array usuarios (del valor):
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
         echo "<br>¡Hola Usuario $nombreUsuario !<br>";
         echo "<p><a href=carritoCompra.php>Acceder al Carrito de Compras</a></p>";
         echo "<p></p><a href=\"logout.php\">Cerrar sesión</a></p>";
      }
      $_SESSION["authok"] = 1;
   } else {
      //si la autenticación falla, se redirigie a la página inicial, mostrando mensaje de error
      //que se puede ver en index.php:
      header("Location: index.php?redir=si");
   }
}

?>

