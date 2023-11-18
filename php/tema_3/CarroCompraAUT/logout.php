<?php

// Código al que se dirigen los enlaces para cerrar sesión.

session_start();
session_destroy();
header('Location: index.php');
?>
