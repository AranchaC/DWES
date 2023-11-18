<!-- 
Este código asegura que solo los usuarios autenticados (que han iniciado sesión correctamente) 
tengan acceso a las partes protegidas de la aplicación. 
Si el usuario no ha iniciado sesión, se le redirige a la página de inicio 
con un indicador de redirección. 
-->

<?php
session_start();

// Verificación si la variable de sesión 'authok' no está establecida o si su valor no es igual a 1.
if (! isset($_SESSION["authok"]) || $_SESSION["authok"] != 1 ) {
    // Si la autenticación no es exitosa, se redirige al usuario a la página de inicio (index.php) 
    //con un indicador de redirección.
    header("Location: index.php?redir=si");
    // Se finaliza la ejecución para evitar que el código siguiente se ejecute en caso de redirección.
    exit();
}
?>
