<?php

session_start();

$frutas = array(
    "manzana" => 5,
    "pera" => 3,
    "limones" => 6
);

foreach ($frutas as $key => $value) {
   echo $key . " - " . $value . "<br>";
}

$usuario1 = "arancha";
$usuario2 = "pepe";

$pass1 = password_hash("aran", PASSWORD_DEFAULT);
$pass2 = password_hash("pepe", PASSWORD_DEFAULT);

$usuarios = array(
    $usuario1 => $pass1,
    $usuario2 => $pass2,
);

foreach ($usuarios as $usu => $pass){
    echo "Usuario: " . $usu . "<br> Contraseña: " . $pass . "<br>";
}

$num = 3;

if (! $num % 2 != 0) {
    echo " el número " . $num . " es par";
} 

$array[] = $_SESSION["nombre"];

if (isset($_REQUEST["value"])){
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>