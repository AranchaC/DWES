<!DOCTYPE html>
<html>

<head>
    <title>Ejemplo de Formulario</title>
    <!-- línea de estilo color rojo, que luego aplico con span en el lugar correspondiente -->
    <style> .error{color: red;} </style>
</head>

<body>

    <?php
    //creo tabla para poner los datos de servidor, uno por cada fila:
    echo "<table border='1'>";
        echo "<tr><th>Datos servidor: </th></tr>";
        // Mostrar datos del servidor:
        echo "<tr><td>Nombre Servidor: </td><td>" . $_SERVER['SERVER_NAME'] . "</td></tr>";
        echo "<tr><td>IP remota: </td><td>" . $_SERVER['REMOTE_ADDR'] . "</td></tr>";
        echo "<tr><td>Protocolo: </td><td>" . $_SERVER['SERVER_PROTOCOL'] . "</td></tr>";
        echo "<tr><td>Servidor / Software: </td><td>" . $_SERVER['SERVER_SOFTWARE'] . "</td></tr>";
    echo "</table>";
        echo "<br>";
    // creo tabla para poner las cabeceras:
    echo "<table border='1'>";
        echo "<TR><TH>Cabeceras: </TH></TR>";
        // Mostrar cabeceras que contienen "User-" o "Accept"
        $cabecera = apache_request_headers();
        foreach ($cabecera as $campo => $contenido) {
            if (substr_count($campo, "User-") != 0) {
                echo "<TR><TD>$campo</TD><TD>$contenido</TD></TR>";
            }//if
            if (substr_count($campo, "Accept") != 0) {
                echo "<TR><TD>$campo</TD><TD>$contenido</TD></TR>";
            }//if
        }//foreach
    echo "</table>";

    //creo variables que usaré si se ha dado al botón de enviar o confirmar:
    $enviado = false;
    $confirmado = false;

    // Comprobar si se envió el formulario y creo variable.
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $enviado = true;}

    // Comprobar si se ha confirmado y creo variable.
    if (isset($_REQUEST['confirmar'])){
        $confirmado = true;}

    // Función para obtener un valor de una variable, con un valor por defecto si no existe.
    function si_existe($clave, $valor_defecto) {
        //si recibe dato, se asigna ese dato y si no el valor por defecto.
        return isset($_REQUEST[$clave]) ? $_REQUEST[$clave] : $valor_defecto;
    }

    //Creo variables con los valores obtenidos de los campos del formulario (llamando a la función).
    $nombre = si_existe("nombre", "");
    $edad = si_existe("edad", 0);
    $email = si_existe("email", "");
    $comida = si_existe("comida", "");
    $hobbies = si_existe("hobbies", []);
    $ciudades = si_existe("ciudades", []);
    ?>

    <h2>Formulario </h2>
    <!-- Si se ha dado a confirmar, se muestran los datos del formulario: -->
    <?php if($confirmado){ ?>
        <h3>Datos Confirmados:</h3>
            <p>Nombre: <?php echo $nombre; ?></p>
            <p>Edad: <?php echo $edad; ?></p>
            <p>Email: <?php echo $email; ?></p>
            <p>Comida: <?php echo $comida; ?></p>
            <p>Hobbies: <?php echo implode(', ',$hobbies); ?></p>
            <p>Ciudades: <?php echo implode(', ',$ciudades); ?></p>
            <a href="p2-ud2-version2.php">[Volver]</a>
    <?php } 

    // Y si no se ha dado a confirmar, se muestra el formulario:
    if (!$confirmado){ ?>
    <!-- Creo formulario con action al propio formulario -->
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <!-- Antes de cada campo, aplico estilo error si el formulario se ha enviado y hay mensajes de error. -->

            <!-- Creo tres campos de tipo texto -->
            <!-- como valor, aplico lógica de si recibe datos, tenga ese dato y si no campo vacío, para que recuerden los datos. -->
            <?php if ($enviado){ echo "<span class='error'>" . validarNombre($nombre) . "</span><br>"; } ?>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" value="<?php echo isset($_POST['nombre']) ? $_POST['nombre'] : ''; ?> ">
            <br><br>
            <?php if ($enviado){ echo "<span class='error'>" . validarEdad($edad) . "</span><br>"; } ?>
            <label for="edad">Edad: </label>
            <input type="text" name="edad" value="<?php echo isset($_POST['edad']) ? $_POST['edad'] : ''; ?> ">
            </br></br>
            <?php if ($enviado){ echo "<span class='error'>" . validarEmail($email) . "</span><br>"; } ?>
            <label for="email">Email: </label>
            <input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?> ">
            </br></br>

            <!-- Creo 4 input de tipo radio, solo se selecciona 1 opción -->
            <!-- en cada uno, si recibe dato y si su dato corresponde con su value, el campo será checked. -->
            <?php if ($enviado){ echo "<span class='error'>" . validarComida($comida) . "</span><br>"; } ?>
            <label>¿Qué prefieres?:</label>
            <input type="radio" name="comida" value="pizza" <?php if (isset($_POST['comida']) && $_POST['comida'] == 'pizza') echo 'checked'; ?>>
            <label for="pizza">Pizza</label>
            <input type="radio" name="comida" value="hamburguesa" <?php if (isset($_POST['comida']) && $_POST['comida'] == 'hamburguesa') echo 'checked'; ?>>
            <label for="hamburguesa">Hamburguesa</label>
            <input type="radio" name="comida" value="croquetas" <?php if (isset($_POST['comida']) && $_POST['comida'] == 'croquetas') echo 'checked'; ?>>
            <label for="croquetas">Croquetas</label>
            <input type="radio" name="comida" value="coliflor" <?php if (isset($_POST['comida']) && $_POST['comida'] == 'coliflor') echo 'checked'; ?>>
            <label for="coliflor">Coliflor</label>
            </br></br>

            <!-- creo 5 campos checkbox, que serán array y multiselección -->
            <!-- en cada uno, si en el array está su value, entonces será checked (para recordar el dato) -->
            <?php if ($enviado){ echo "<span class='error'>" . validarHobbies($hobbies) . "</span><br>"; } ?>
            <label>Hobbies:</label>
                <input type="checkbox" name="hobbies[]" value="Deportes" <?php if (in_array('Deportes', $hobbies)) echo 'checked'; ?>>
                <label for="hobby1">Deportes</label>
                <input type="checkbox" name="hobbies[]" value="Lectura" <?php if (in_array('Lectura', $hobbies)) echo 'checked'; ?>>
                <label for="hobby2">Lectura</label>
                <input type="checkbox" name="hobbies[]" value="Viajes" <?php if (in_array('Viajes', $hobbies)) echo 'checked'; ?>>
                <label for="hobby3">Viajes</label>
                <input type="checkbox" name="hobbies[]" value="Música" <?php if (in_array('Música', $hobbies)) echo 'checked'; ?>>
                <label for="hobby4">Música</label>
                <input type="checkbox" name="hobbies[]" value="Cocina" <?php if (in_array('Cocina', $hobbies)) echo 'checked'; ?>>
                <label for="hobby5">Cocina</label>
            </br></br>


            <!-- creo campos select con 5 opctions, serán multiseleccion y tipo array -->
            <!-- en cada uno, si en el array está su value, entonces será selected (para recordar el dato) -->
            <?php if ($enviado){ echo "<span class='error'>" . validarCiudades($ciudades) . "</span><br>"; } ?>
            <label for="ciudades">Ciudades que has visitado:</label>
            <select name="ciudades[]" multiple>
                <option value="Nueva York" <?php if (in_array('Nueva York', $ciudades)) echo 'selected'; ?>>Nueva York</option>
                <option value="Boston" <?php if (in_array('Boston', $ciudades)) echo 'selected'; ?>>Boston</option>
                <option value="Londres" <?php if (in_array('Londres', $ciudades)) echo 'selected'; ?>>Londres</option>
                <option value="Roma" <?php if (in_array('Roma', $ciudades)) echo 'selected'; ?>>Roma</option>
                <option value="AtenasV" <?php if (in_array('AtenasV', $ciudades)) echo 'selected'; ?>>Atenas en Verano</option>
                <option value="AtenasI" <?php if (in_array('AtenasI', $ciudades)) echo 'selected'; ?>>Atenas en Invierno</option>
            </select>
            </br></br>

            <!-- y creo boton sumbit de enviar y otro de reset para borrar datos. -->
            <input type="submit" value="Enviar">
            <input type="reset" value="Borrar Formulario">
          
        
    <?php }
    //creo funciones de validación con restricciones para cada campo del formulario:

        //validar nombre: obligatorio, min 3 caracteres y max 10 caracteres..
        function validarNombre($nombre){
            $nombre = trim($nombre);
            if (empty($nombre)){
                return "Es obligatorio";
            }elseif (strlen($nombre) > 10 || strlen($nombre) < 3){
                return "Tienen que tener entre 3 y 10 carácteres.";
            }else{
                return "";
            }
        }

        //validar edad: campo numérico y entre 18 y 70.
        function validarEdad($edad){
            $edad = trim($edad);
            if (!is_numeric($edad)) {
                return "Pon un número";
            } elseif ($edad < 18 || $edad > 70) {
                return "La edad deber estar entre 18 y 70.";
            } else {
                return "";
            }
        }

        //validar email: debe tener @ y .com.
        function validarEmail($email){
            $email = trim($email);
            if (substr_count($email, "@") == 0 || substr_count($email, ".com") == 0) {
                return "Pon un email válido.";
            } else {
                return "";
            }
        }

        //validar comida: coliflor campo prohibido.
        function validarComida($comida){
            if (substr_count($comida, "coliflor") != 0){
                return "No puedes seleccionar coliflor.";
            }else{
                return "";
            }
        }

        //validar hobbies: mínimo 2.
        function validarHobbies($hobbies){
            if (count($hobbies) <2){
                return "Selecciona al menos 2.";
            } else{
                return "";
            }
        }

        //validar ciudades: atenasV y atenasI no son compatibles.
        function validarCiudades($ciudades){
            if(in_array('AtenasV', $ciudades) && in_array('AtenasI',$ciudades)){
                return "Atenas en Verano y Atenas en Invierno son incompatibles.";
            } else{
                return "";
            }
        }

        // Crear un array de errores y eliminar cadenas vacías:
        $errores = array();
        $errores[] = validarNombre($nombre);
        $errores[] = validarEdad($edad);
        $errores[] = validarEmail($email);
        $errores[] = validarComida($comida);
        $errores[] = validarHobbies($hobbies);
        $errores[] = validarCiudades($ciudades);
        // elimina las cadenas vacías
        $errores = array_filter($errores);

        // Mostrar los datos si la validación fue exitosa, es decir si no hay errores:
        if ($enviado = true && (empty($errores))){
            echo "<br><h3>Has enviado los siguientes datos: </h3>
            Nombre: $nombre<br>
            Edad: $edad<br>
            Email: $email<br>
            Comida: $comida<br>
            Hobbies: " . implode(', ', $hobbies) . "<br>
            Ciudades: " . implode(', ', $ciudades) . "<br><br><br>";    
        }//if

        ?>
        <input type="submit" name="confirmar" value="Confirmar" <?php echo ($_SERVER["REQUEST_METHOD"] == "POST" && (empty($errores))) ? '' : 'disabled'; ?>>
    </form>

</body>

</html>