<!-- 
Este código asegura que solo los usuarios autenticados (que han iniciado sesión correctamente) 
tengan acceso a las partes protegidas de la aplicación. 
Si el usuario no ha iniciado sesión, se le redirige a la página de inicio 
con un indicador de redirección. 
-->

<?php
session_start();
if (! isset($_SESSION["authok"])
    || $_SESSION["authok"] != 1 )
{
    header("Location: index.php?redir=si");
    exit();
}
?>
