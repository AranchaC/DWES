<?php
$validUser = "pepe";
$validPass = "pepe";

if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Acceso restringuido"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Has cancelado';
    exit;
}

if (($_SERVER['PHP_AUTH_USER'] == $validUser) &&
	($_SERVER['PHP_AUTH_PW'] == $validPass))
{
	echo "<h1>Bienvenido $validUser</h1>";
	echo "<a href=\"http://otro:o@localhost/php/tema_3/aut.php\">Cerrar sesión</a>";
}
elseif (isset($_REQUEST["logout"]))  {
    header('WWW-Authenticate: Basic realm="Acceso restringuido"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Has cancelado';
    echo "<a href=\"/php/tema_3/aut.php\">Volver a intentar</a>";
//    header('Location: http://localhost/web/auth/');
}
else {
	echo "<h1>Acceso denegado</h1>";
	echo "<a href=\"/php/tema_3/aut.php/?logout=si\">Volver a intentar</a>";
}

?>