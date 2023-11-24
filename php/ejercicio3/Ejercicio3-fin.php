<?php

session_start();

?>


<html>
<head>
<title>Ejercicio 3 FIN</title>
</head>
<body>
<h1>Ejercicio 3 resumen:</h1>
<p>Nombre: <?php echo $_SESSION['nombre']  ?> </p>
<p>Ciudad: <?php echo $_SESSION['ciudad']  ?></p>
<p>Edad: <?php echo $_SESSION['edad']  ?></p>
<p><a href="Ejercicio3-3.php">Anterior</a></p>
<p><a href="Ejercicio3-1.php">Volver a empezar</a></p>
</body>
</html>
