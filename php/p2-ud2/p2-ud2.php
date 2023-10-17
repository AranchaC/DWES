<!DOCTYPE html>
<html>
<head>
    <title>Ejemplo de Formulario</title>
</head>
<body>
    <h2>Formulario </h2>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <!-- max 10 caracteres -->
        <!-- obligatorio -->
        <label for="nombre">Nombre:  </label>
        <input type="text" name="nombre">
        <br><br>
        <!-- min 18 y max 70 -->
        <label for="edad">Edad: </label>
        <input type="number" name="edad">
        </br></br>
        <!-- obligatorio tener @ y .com -->
        <label for="email">Email: </label>
        <input type="text" name="email">
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

        function si_existe($clave, $valor_defecto){
            return isset($_REQUEST[$clave]) ? $_REQUEST[$clave] : $valor_defecto;
        }

        //validar nombre: obligatorio y min 10.
        function validarNombre($nombre){
            if (empty($nombre)){
                return "<br> Es obligatorio <br>";
            }elseif (strlen($nombre) > 10){
                return "<br> Tienen que tener menos de 10 carácteres.<br>";
            }else{
                return "";
            }
        }

        //validar edad: entre 18 y 70
        function validarEdad($edad){
            if ($edad < 18 || $edad > 70){
                return "La edad deber estar entre 18 y 70.";
            } else{
                return "";
            }
        }

        //validar email: debe tener @ y .com
        function validarEmail($email){
            if (substr_count($email, "@")==0 || substr_count($email, ".com")==0){
                return "Pon un email válido.";
            } else {
                return "";
            }
        }

        $nombre = si_existe("nombre","");
        $edad = si_existe("edad",0);
        $email = si_existe("email","");
        
        $errores = array();
        $erroes[] = validarNombre($nombre);
        $errores[] = validarEdad($edad);
        $errores[] = validarEmail($email);
        // elimina las cadenas vacías
        $errores = array_filter($errores);

        $resultado;
        
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!empty($errores)){
                echo "<br>Se han detectado estos errores:";
                foreach($errores as $error){
                    echo "<br> $error <br>";
                }
            }else{
                echo "Has enviado los siguientes datos: <br>
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
<br<