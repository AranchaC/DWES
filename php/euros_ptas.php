<!DOCTYPE html>
<html>
<head>
    <title>Conversor de Euros a Pesetas</title>
</head>
<body>
    <h1>Conversor de Euros a Pesetas</h1>

    <?php
    // Comprobar si se ha enviado el formulario
    if (isset($_POST["convertir"])) {
        // Obtener la cantidad en euros ingresada por el usuario
        $euros = $_POST["euros"];

        // Comprobar si se ingresó una cantidad válida
        if (! $euros == "") {
            // Calcular la equivalencia en pesetas
            $pesetas = $euros * 166.386;

            // Mostrar el resultado
            echo "<p>$euros euro(s) equivale(n) a $pesetas pesetas</p>";
        } else {
            // Mensaje de error si no se ingresó una cantidad válida
            echo "<p>Debe introducir una cantidad.</p>";
        }

        // Enlace para volver
        echo '<a href="euros_ptas.php">[Volver]</a>';
    } else {
        // Formulario para ingresar la cantidad en euros
        echo '<form method="post" action="">
                  <label for="euros">Cantidad en euros:</label>
                  <input type="number" name="euros">
                  <input type="submit" name="convertir" value="Convertir">
              </form>';
    }
    ?>

</body>
</html>
