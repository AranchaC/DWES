<!DOCTYPE html>
<html>
<head>
    <title>Conversor de Euros a Pesetas</title>
</head>
<body>
    <h1>Conversor de Monedas</h1>

    <?php
    // Comprobar si se ha enviado el formulario
    if (isset($_POST["convertir"])) {
        // Obtener la cantidad en euros ingresada por el usuario
        $euros = $_POST["euros"];

        // Comprobar si se ingresó una cantidad válida
        if (! $euros == "") {
            $moneda = $_POST["monedas"];
            if ($moneda == "dolares"){
                $dolares = $euros * 1.325;
                echo "<p>$euros euro(s) equivale(n) a: $dolares dólares USA.</p>";
            } elseif ($moneda == "libras") {
                $libras = $euros * 0.927;
                echo "<p>$euros euro(s) equivale(n) a: $libras libras esterlinas.<br/></p>";
            } elseif ($moneda == "yenes") {
                $yenes = $euros * 118.232;
                echo "<p>$euros euro(s) equivale(n) a: $yenes yenes japoneses.<br/></p>";
            } elseif ($moneda == "francos") {
                $francos = $euros * 1.515;
                echo "<p>$euros euro(s) equivale(n) a: $francos francos suizos.<br/></p>";
            }
        } else {
            // Mensaje de error si no se ingresó una cantidad válida
            echo "<p>Debe introducir una cantidad.</p>";
        }

        // Enlace para volver
        echo '<a href="conversorMonedas.php">[Volver]</a>';
    } else {
        // Formulario para ingresar la cantidad en euros
        echo '<form method="post" action="">
                <input type="number" name="euros">
                <label for="monedas">Convertir a: </label>
                <select name="monedas" id="mon">
                    <option value="dolares">Dólares USA</option>
                    <option value="libras">Libras esterlinas</option>
                    <option value="yenes">Yenes japones</option>
                    <option value="francos">Francos suizos.</option>
                </select><br/><br/>
                <input type="submit" name="convertir" value="Convertir">
              </form>';
    }
    ?>

</body>
</html>
