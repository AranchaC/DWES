<?php
/*
 Ejemplo de autenticación básica HTTP desde PHP.
 Solo mostrará Bienvenido cuando se suministre usuario que coincida con $validUser y contraseña cuyo hash
  está en $validHash compuesto con password_hash
Para eludir el problema de HTTP por el que el navegador no borra credenciales y sigue enviando las mismas en cada
 petición, sean correctas o no, vamos a una página de logout cuando queremos olvidarlas.

 En el caso de Firefox puede ser necesaria una recarga con F5 o CTRL-F5 si cancelamos varias veces y luego
 entra directamente a Acceso denegado sin pedir credenciales, pues lo hace por la caché local de Firefox.
 Solucionado parcialmente con parámetros $random

 Hay un problema para olvidar sesión, funciona en Firefox con enlace nouser:nopass@localhost pero no en Chrome (luego no   deja entrar de nuevo)
 La solución en esta V3 es ir a una página de logout.php y una variable de sesión que pida credenciales solo si es el primer acceso y así no entre en bucle

Más en: 
https://stackoverflow.com/questions/233507/how-to-log-out-user-from-web-site-using-basic-authentication
y los ejemplos de: https://www.php.net/manual/en/features.http-auth.php
*/

//VARIABLES DONDE ALAMCENAR USUARIO Y CONTRASEÑA HASH.
$validUser = "pepe";
$validHash = '$2y$10$utU7HvO3xUbp9B5owBNtuuJSkG8GczzGz1cTtpFvNBtAOzfloXSRC';
$random = uniqId(); // para evitar la caché, especialmente en Firefox

// Si no se mandan credenciales, se piden:
//ACCEDEMOS A ESTAS CREDENCIALES CON $_SERVER['PHP_AUTH_USER'], QUE ES UNA VARIBALE PREDEFINIDAD 
//ALMACENADA EN EL ARRAY SERVER.
if (!isset($_SERVER['PHP_AUTH_USER'])) {

    //SE ENVÍA UN HEADER DE AUTENTICACIÓN REQUERIDA PARA MOSTRAR VENTANA EMERGENTE
    //PARA PONER CLAVES Y SE MUESTRA UN MENSAJE:
    header('WWW-Authenticate: Basic realm="Acceso restringuido"');
    header('HTTP/1.0 401 Unauthorized');

    //MENSAJES A MOSTRAR SI DAMOS A CANCELAR:
    echo "<h1>Acceso denegado 1</h1>";
    // URL entera para quitar parámetros extra:
    echo "<a href=\"logout-hash.php?id=$random\">Volver a intentar</a>";
    exit;
}

// Caso usuario válido:
//HACEMOS LA VERIFICACIÓN COMPARANDO LOS VALORES INTRODUCIDOS CON LAS VARIABLES PREDEFINIDAS ESTABLECIDAS
//EN 'PHP_AUTH_USER' PARA EL USUARIO Y EN 'PHP_AUTH_PW' PARA LA CONTRASEÑA.
//ESTAS VARIABLES ESTÁN EL ARRAY SERVER, Y ACCEDEMOS A ELLAS DE LA SIGUIENTE MANERA.
if (($_SERVER['PHP_AUTH_USER'] == $validUser) && password_verify($_SERVER['PHP_AUTH_PW'],$validHash)) {
	echo "<h1>Bienvenido $validUser</h1>";
	// No funciona con Chrome, si en Firefox
	// echo "<a href=\"http://nouser:nopass@localhost/" . $_SERVER['SCRIPT_NAME'] . "\">Cerrar sesión</a>";
    echo "<a href=\"logout-hash.php?id=$random\">Cerrar sesión</a>";
}
// caso credenciales incorrectas:
//Y SI FALLA LA VERIFICACIÓN, MOSTRAMOS MENSAJE 
//Y ENLACE PARA VOLVER A QUE TE PIDAN LAS CLAVES, REDIRIGIENDO A LOGOUT-HASH.PHP:
else {
	echo "<h1>Acceso denegado 3</h1>";
    echo "<a href=\"logout-hash.php?id=$random\">Volver a intentar</a>";
}

?>
