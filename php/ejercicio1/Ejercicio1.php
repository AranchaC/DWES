<?php

 // session_start();

$enviado = false;
$mensaje = "Apodo o grupo vacío o no has aceptado las condiciones";
$enviar = isset($_REQUEST['enviar']) ? $_REQUEST['enviar'] : "";

//validar apodo:
$apodo = isset($_REQUEST['apodo']) ? trim($_REQUEST['apodo']) : "" ;
$apodoOK = false;
if (strlen($apodo) > 0) {
    $apodoOK = true;
} 

//validad grupo:
$grupo = isset($_REQUEST['grupo']) ? $_REQUEST['grupo'] : "" ;
$grupoOK = false;
if ($grupo != "") {
    $grupoOK = true;
} 

//validar campo checkbox
$condiciones = isset($_REQUEST['deacuerdo']) ? $_REQUEST['deacuerdo'] : "" ;
$condicionesOK = false;
if (!empty($condiciones)){
    $condicionesOK = true;
}

//si damos a enviar:
if ($enviar) {
    //si apodo y grupo están ok:
    if ($apodoOK && $grupoOK && $condicionesOK ){
        $enviado = true;
    } else {
        echo $mensaje;
    }
} 

?>

<html>
    <head>
        <title>Ejercicio 1</title>
    </head>
    <body>
        <h1>Ejercicio 1</h1>

        <?php
        // si no se ha dado a enviar, es decir, al abrir el navegador se muestra el formulario:
            if (!$enviado){
        ?>
            <!-- POST en method para que encriptar los datos en la url -->
            <form action="" method="POST">
            <p>
                <label for="apodo">Apodo:</label>
                <input type="text" name="apodo" value="<?php echo $apodo ?>"/>
            </p>
            <p>
                <label for="grupo">Grupo:</label>
                <select name="grupo">
                    <option></option>
                    <option <?php if($grupo == "A") echo "selected" ?>>A</option>
                    <option <?php if($grupo == "B") echo "selected" ?>>B</option>
                    <option <?php if($grupo == "C") echo "selected" ?>>C</option>
                </select>
            </p>
            <p>
            <label for="grupo">
                <input type="checkbox" name="deacuerdo" value="deacuerdo" />
                De acuerdo
            </label>
            </p>
            <p>
                <input type="submit" name="enviar" value="Enviar" />
            </p>
            </form>
            <?php 
            // y si se ha dado a enviar, en vez del formulario se muestra la siguiente info:
        } else {
            echo "Apodo: " . $apodo . "<br><br> Grupo: " . $grupo . "<br><br> Has aceptado las condiciones <br><br>";          
        ?>
        <a href="Ejercicio1.php">Volver a empezar</a>
        <?php
        }
        ?>
    </body>
</html>
