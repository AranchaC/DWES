<?php
session_start();
$validUser = "pepe";
$validHash = '$2y$10$utU7HvO3xUbp9B5owBNtuuJSkG8GczzGz1cTtpFvNBtAOzfloXSRC';

/*
 Fuerza volver a pedir credenciales pero solo la primera vez (controlado con $_SESSION['auth']
 para no entrar en bucle.
 
*/
if (!isset($_SESSION['auth']) || (!isset($_SERVER['PHP_AUTH_USER']))
 || ($_SERVER['PHP_AUTH_USER'] != $validUser) 
 ||  !password_verify($_SERVER['PHP_AUTH_PW'],$validHash))
{
    // SE ESTABLECE LA VARIABLE DE SESIÓN AUTH PARA CONTROLAR LA PRIMERA VEZ QUE SE 
    // SOLICITAN CREDENCIALES:
    $_SESSION['auth']=1;

    // SE ENVÍA ENCABEZADO DE AUTENTICACIÓN BASIC:
    header('WWW-Authenticate: Basic realm="Acceso restringido"');
    header('HTTP/1.0 401 Unauthorized');
}
    // MUESTRA ENLACE PARA VOLVER A LA PÁGINA ANTERIOR:
    echo "<a href=\""  . $_SERVER['HTTP_REFERER']  . "\">Entrar (pulse F5 si no funcionase)</a>";
?>
