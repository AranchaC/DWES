<!DOCTYPE html>
<html>

<head>
    <title>Ejemplo de Formulario</title>
</head>

<body>

    <?php
    echo "Datos servidor: <br>";
    echo "Nombre Servidor: " . $_SERVER['SERVER_NAME'] . "<br>";
    echo "IP remota: " . $_SERVER['REMOTE_ADDR'] . "<br>";
    echo "Protocolo: " . $_SERVER['SERVER_PROTOCOL'] . "<br>";
    echo "Servidor / Software: " . $_SERVER['SERVER_SOFTWARE'] . "<br>";

    echo "<br>Datos cabecera: <br>";
    echo "<table border='1'>";
    echo "<TR>";
    echo "<TH>CABECERAS:</TH>";
    echo "<TD>";

    echo "</TD></TR>\n";
    $cabecera = apache_request_headers();
    foreach ($cabecera as $campo => $contenido) {
        if (substr_count($campo, "User-") != 0) {
            echo "<TR><TD>$campo</TD><TD>$contenido</TD></TR>";
        }
        if (substr_count($campo, "Accept") != 0) {
            echo "<TR><TD>$campo</TD><TD>$contenido</TD></TR>";
        }
    }
    echo "</table>";

    // función apache_request_headers
    $enviado = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $enviado = true;
    }

    function si_existe($clave, $valor_defecto) {
        return isset($_REQUEST[$clave]) ? $_REQUEST[$clave] : $valor_defecto;
    }

    $nombre = si_existe("nombre", "");
    $edad = si_existe("edad", 0);
    $email = si_existe("email", "");
    ?>

    <h2>Formulario </h2>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <!-- max 10 caracteres -->
        <!-- obligatorio -->
        <?php if ($enviado){ echo validarNombre($nombre) . "<br>"; } ?>
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" value="<?php echo isset($_POST['nombre']) ? $_POST['nombre'] : ''; ?> ">
        <br><br>
        <!-- min 18 y max 70 -->
        <?php if ($enviado){ echo validarEdad($edad) . "<br>"; } ?>
        <label for="edad">Edad: </label>
        <input type="text" name="edad" value="<?php echo isset($_POST['edad']) ? $_POST['edad'] : ''; ?> ">
        </br></br>
        <!-- obligatorio tener @ y .com -->
        <?php if ($enviado){ echo validarEmail($email) . "<br>"; } ?>
        <label for="email">Email: </label>
        <input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?> ">
        </br></br>

        <!-- coliflor campo prohibido -->
        <label>¿Qué prefieres?:</label>
        <input type="radio" name="comida" value="pizza">
        <label for="pizza">Pizza</label>
        <input type="radio" name="comida" value="hamburguesa">
        <label for="hamburguesa">Hamburguesa</label>
        <input type="radio" name="comida" value="croquetas">
        <label for="croquetas">Croquetas</label>
        <input type="radio" name="comida" value="coliflor">
        <label for="coliflor">Coliflor</label>
        </br></br>

        <!-- min 2 -->
        <label>Hobbies:</label>
        <input type="checkbox" name="hobbies[]" value="Deportes">
        <label for="hobby1">Deportes</label>
        <input type="checkbox" name="hobbies[]" value="Lectura">
        <label for="hobby2">Lectura</label>
        <input type="checkbox" name="hobbies[]" value="Viajes">
        <label for="hobby3">Viajes</label>
        <input type="checkbox" name="hobbies[]" value="Música">
        <label for="hobby4">Música</label>
        <input type="checkbox" name="hobbies[]" value="Cocina">
        <label for="hobby5">Cocina</label>
        </br></br>

        <!-- atenasV y atenasI : opciones incompatibles. -->
        <label for="ciudades">Ciudades que has visitado:</label>
        <select name="ciudades[]" multiple>
            <option value="Nueva York">Nueva York</option>
            <option value="Boston">Boston</option>
            <option value="Londres">Londres</option>
            <option value="Roma">Roma</option>
            <option value="AtenasV">Atenas en Verano</option>
            <option value="AtenasI">Atenas en Invierno</option>
        </select>
        </br></br>

        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar Formulario">

        <?php


        //validar nombre: obligatorio y min 10.
        function validarNombre($nombre){
            if ($nombre === "" || $nombre === 0){
                return "Nombre: Es obligatorio";
            }elseif (strlen($nombre) > 10){
                return "Nombre: Tienen que tener menos de 10 carácteres.";
            }else{
                return "";
            }
        }

        //validar edad: entre 18 y 70
        function validarEdad($edad)
        {
            if (!is_numeric($edad)) {
                return "Edad: Pon un número";
            } elseif ($edad < 18 || $edad > 70) {
                return "Edad: La edad deber estar entre 18 y 70.";
            } else {
                return "";
            }
        }

        //validar email: debe tener @ y .com
        function validarEmail($email)
        {
            if (substr_count($email, "@") == 0 || substr_count($email, ".com") == 0) {
                return "Eamil: Pon un email válido.";
            } else {
                return "";
            }
        }

        $errores = array();
        $errores[] = validarNombre($nombre);
        $errores[] = validarEdad($edad);
        $errores[] = validarEmail($email);
        // elimina las cadenas vacías
        $errores = array_filter($errores);

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty($errores)){
                echo "<br>Has enviado los siguientes datos: <br>
                Nombre: $nombre<br>
                Edad: $edad<br>
                Email: $email<br>
                
                ";
            }
        }


        ?>

    </form>
</body>

</html>