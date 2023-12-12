


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

<!-- Mostrar SOLO si el inicio de sesión es válido cambiando nombre por su usuario: -->
<!-- Bienvenido NOMBRE -->

<?php
$passwd = array(
"user1" => '$2y$10$3SgeyVJD/mw0rvRtjkwWk.8XM1.GpDr8NWc95bN.tpSK2sEriXtX2',
"user2" => '$2y$10$OymrA3YaPJ4Pfnh.H3GOneuD2y5OklZVW28OxrniOdkDyLWPN/80u',
"user3" => '$2y$10$qmNdtRRxXXfVRQy8Sjb7bey1RZqj.I2sz3NvUO2kuz2hjZHud2rrC',
"user4" => '$2y$10$s4PyteQlBtBLtdL0pO9jQ.3TEB0z2kAMGfQCmpNig91Q8o8hwEZY6',
"user5" => '$2y$10$kNiEqiag6PPROoFQM9E6BuEEVYPm6Lev9OS7y9N20FdRnTeCqBC0y',
"user6" => '$2y$10$CrbCkq6F.RCI4nyydjXwKu5hSRf4ZSrNi6J5P3jJJ8Fl4JlTz57Y2',
"user7" => '$2y$10$rXNAShF5ADOowmIV.82KnuMHntgpbvG5oQtFs1/KQrKCkipDTK2BS',
"user8" => '$2y$10$FFkEH4zNMAC5R8UPFahqMeYdVqQtSfMMW0oLD6e4zOTWyTtZWmSJG',
"user9" => '$2y$10$ClccGXvtRiKGkwgh4fhNKOLqnYDs/ta2bqbeiA4o7RVrZ0Koiz1kG',
"user10" => '$2y$10$dX8LQLCIcJc5IwHqdP1aVOiINd0SF1IfPu8xzf4tnCyxuIonXRbf.'
);

 // Recorrido de un array asociativo:
 // foreach ($passwd as $user => $pass) { ... }






?>
