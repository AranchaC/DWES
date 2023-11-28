<?php
include('Ejercicio4.php');

session_start();
session_destroy();
header('Location: Ejercicio4.php');

?>