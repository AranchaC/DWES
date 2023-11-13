<?php
session_start();
session_destroy();
/*
 Ejemplo de autenticación básica HTTP desde PHP.
 Solo mostrará Bienvenido cuando se suministre usuario que coincida con $validUser y contraseña con $validPass
 Ojo que la contraseña está en texto plano y esto es una mala praxis, ver el siguiente ejemplo con hash mejor.
 Para eludir el problema de HTTP por el que el navegador no borra credenciales y sigue enviando las mismas en cada
 petición, sean correctas o no, vamos a una página de logout cuando queremos olvidarlas.

 En el caso de Firefox puede ser necesaria una recarga con F5 o CTRL-F5 si cancelamos varias veces y luego
 entra directamente a Acceso denegado sin pedir credenciales, pues lo hace por la caché local de Firefox.
 Solucionado parcialmente con parámetros $random

 Hay un problema para olvidar sesión, funciona en Firefox con enlace nouser:nopass@localhost pero no en Chrome (luego no deja entrar de nuevo)
 La solución en esta V3 es ir a una página de logout.php y una variable de sesión que pida credenciales solo si es el primer acceso
 y así no entre en bucle

Más en: 
https://stackoverflow.com/questions/233507/how-to-log-out-user-from-web-site-using-basic-authentication
y los ejemplos de: https://www.php.net/manual/en/features.http-auth.php

*/

$validUser = "pepe";
$validPass = "pepe";
$random = uniqId(); // para evitar la caché, especialmente en Firefox

// Si no se mandan credenciales, se piden:
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Acceso restringido"');
    header('HTTP/1.0 401 Unauthorized');
    echo "<h1>Acceso denegado 1</h1>";
    echo "<a href=\"logout.php?id=$random\">Volver a intentar</a>";
    exit;
}
// Caso usuario válido:
if (($_SERVER['PHP_AUTH_USER'] == $validUser) && ($_SERVER['PHP_AUTH_PW'] == $validPass)) {
	echo "<h1>Bienvenido $validUser</h1>";
	// No funciona con Chrome, si en Firefox
	// echo "<a href=\"http://nouser:nopass@localhost/" . $_SERVER['SCRIPT_NAME'] . "\">Cerrar sesión</a>";
	echo "<a href=\"logout.php?id=$random\">Cerrar sesión</a>";
}
// caso credenciales incorrectas:
else {
	echo "<h1>Acceso denegado 3</h1>";
    echo "<a href=\"logout.php?id=$random\">Volver a intentar</a>";
}

?>
