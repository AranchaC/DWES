<?php

include('variables.php');

if (! isset($_SESSION["authok"])) {

?>
    <!-- Mostrar solo si no se ha autenticado ya -->
    <form action="Ejercicio4_1.php">
        <p>
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" />
        </p>
        <p>
            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" />
        </p>
        <p><input type="submit" value="Iniciar sesión" /></p>
    </form>

<?php
}
else {
    echo "Bienvenido " . $usuario. "<br>";
    echo "<a href=\"cerrarSesion.php\">Cerrar sesión</a>";
}

?>
<!-- Mostrar SOLO si el inicio de sesión es válido cambiando nombre por su usuario: -->
<!-- Bienvenido NOMBRE -->

