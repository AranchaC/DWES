<?php
session_start();
$validUser = "pepe";
$validPass = "pepe";

/*
 Fuerza volver a pedir credenciales pero solo la primera vez (controlado con $_SESSION['auth']
 para no entrar en bucle
 
*/
if (!isset($_SESSION['auth']) || (!isset($_SERVER['PHP_AUTH_USER']))
 || ($_SERVER['PHP_AUTH_USER'] != $validUser) || ($_SERVER['PHP_AUTH_PW'] != $validPass)) // cambiar por hash
{
    $_SESSION['auth']=1;
    header('WWW-Authenticate: Basic realm="Acceso restringido"');
    header('HTTP/1.0 401 Unauthorized');
}
    echo "<a href=\""  . $_SERVER['HTTP_REFERER']  . "\">Entrar (pulse F5 si no funcionase)</a>";
?>
