<?php
session_start();
include('Ejercicio4.php');

$usuario = $_REQUEST["usuario"];
$contrasena = $_REQUEST["contrasena"];

//foreach ($passwd as $user => $hash) {
    if (array_key_exists($usuario, $passwd) && password_verify($contrasena,$passwd[$usuario] )) {
        echo "Bienvenido " . $usuario . "<br>";
        $_SESSION['authok'] = 1;


        echo "<a href=\"cerrarSesion.php\">Cerrar sesión</a>";
    } else {
        echo "Usuario y/o contraseñas incorrectos";
    }
//}



?>