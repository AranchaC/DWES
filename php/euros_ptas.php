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

            // Calculamos también la equivalencia en otras monedas
            $dolares = $euros * 1.325;
            $libras = $euros * 0.927;
            $yenes = $euros * 118.232;
            $francos = $euros * 1.515;

            // Mostrar el resultado
            echo "<p>$euros euro(s) equivale(n) a: $pesetas pesetas.<br/><br/> 
             Y además también equivale(n) a: <br/>
             $dolares dólares USA.<br/>
             $libras libras esterlinas.<br/>
             $yenes yenes japones.<br/>
             $francos franos suizos.<br/>             
             </p>";
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
