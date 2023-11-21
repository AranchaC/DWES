<?php

include ('stock.php');
include ('check-auth.php');

$mensaje = "";

foreach ($stock as $nombre => $unidades) {
    if (!isset($_SESSION[$nombre] )) {
        //creamos una sesión por cada producto y asignamos valor inicial 0:
        $_SESSION[$nombre] = $unidades;
    }
}

//BOTÓN ACTUALIZAR: Aplicamos las acciones que queremos para este botón:
if (isset($_POST["actualizar"])) {

    foreach ($stock as $nombre => $precio) {

        $uds_add = intval($_POST[$nombre . "_add"]);
        $uds_remove = intval($_POST[$nombre . "_remove"]);

        $_SESSION[$nombre] += $uds_add + $uds_remove;

        //si la cantidad de uds ingresadas no es un nº negativo, puedo continuar:
        if ($_SESSION[$nombre] >= 0){

            $stock[$nombre] = $_SESSION[$nombre];
            
        //Pero si las uds ingresadas es un nº negativo, sale mensaje de error en rojo:
        } else {
            $mensaje = "<hr><b><font color=\"red\">No puede haber unidades negativas.</font></b><br> <hr>";
        }//else
        
    }//foreach
    file_put_contents(RUTA_ARCHIVO, serialize($stock));       
}

?>

<html>
    <head>
        <title>Carrito Compra</title>
    </head>
    <body>
        <h1>CROQUETERÍA CHICHARRO</h1>
        <h3>Gestión de Stock</h3>
        <form action="" method="POST">
            <table border="1" bordercolor="#0000FF" bgcolor="#AFEEEE" >
                <tr bgcolor="#00BFFF">
                    <th>Producto</th>
                    <th>Añadir Uds</th>
                    <th>Quitar Uds</th>
                    <th>Total uds en Stock</th>
                </tr>
            
            <?php
            foreach ($stock as $nombre => $unidades) { 
                $precio = $productos[$nombre];                  
                ?>
                    <tr>
                        <td>
                            <label><?php echo "$nombre ($precio €/pack)" ?></label>
                        </td>
                        <td>
                            <input type="number" name="<?php echo $nombre . "_add" ?>" min="0" value=0 />                    
                        </td>  
                        <td>
                            <input type="number" name="<?php echo $nombre . "_remove" ?>" max="0" value=0 />
                        </td>

                        <td>
                            <?php echo isset($_SESSION[$nombre]) ? $_SESSION[$nombre] : $unidades; ?>
                        </td>
                    </tr>
                <?php
                }//foreach

                //creo enlace de cerrar sesión que dirige a logout.php:
                echo "<p></p><a href=\"logout.php\">Cerrar sesión</a></p>";
                ?>        

            </table><br>
            <input type="submit" name="actualizar" value="  *****  ACTUALIZAR STOCK  *****  ">
            <?php 
                echo "<h3>Stock disponible (precios y uds): </h3><ol>";
                foreach ($stock as $nombre => $unidades){
                    $precio = $productos[$nombre];
                    echo "<li>$nombre ($precio € /pack): $unidades uds.</li>";       
                }
                echo "</ol>";
                
            ?> 
        </form>
    </body>
</html>
