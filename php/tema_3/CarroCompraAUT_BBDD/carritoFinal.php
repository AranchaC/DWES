<?php
session_start();

include('stock.php');

// Variable para rastrear si hay productos sin stock:
$sinStock = false; 
//recorro array stock, y comparo las uds del stock con las uds de la sesión,
//que son las enviadas al actualizark.
//(al hacerlo con foreach, se hace la comparación producto por producto.)
foreach ($stock as $nombre => $unidades) {
    if ($_SESSION[$nombre] > $stock[$nombre]) {
        $sinStock = true;
    }//if
}//foreach
?>

<html>
    <head>
        <title>Carrito Compra</title>
    </head>
    <body>
        <h1>CROQUETERÍA CHICHARRO</h1>

        <?php      
        //si no hay stock de algo, mensaje de error:
        if ($sinStock) {
            echo "<h3>No hay suficiente stock para completar la compra.</h3>";
            // y añado un enlace hacia el carrito de la compra para volver al carrito: -->
            echo "<a href=\"carritoCompra.php\">[Volver a comprar]</a>";
        } else {
            //pero si hay stock entonces se muestra resumen de la compra con detalle:
        ?>
            <h3>Compra realizada con éxito.</h3>
            <h4>Resumen de la compra:</h4>

            <table border="1" bordercolor="#0000FF" bgcolor="#AFEEEE" >
                    <tr bgcolor="#00BFFF">
                        <th>Producto</th>
                        <th>Unidades</th>
                        <th>Precio</th>
                    </tr>
                    <tr>
                <?php
                foreach ($productos as $nombre => $precio) {
                    // solo se mostrarán los productos con más de 0 uds.
                    if ($_SESSION[$nombre] > 0){?>                    
                        <td><?php echo $nombre ?></td>
                        <td><?php echo $_SESSION[$nombre] ?></td>
                        <td><?php echo ($_SESSION[$nombre]* $precio) . " €"?></td>
                        </tr>
                            <?php
                            //actualizo el stock, restando las uds de los campos que no estén a 0:
                            if ($_SESSION[$nombre] > 0) {
                                $stock[$nombre] -= $_SESSION[$nombre];
                            }//if                      
                        // Actualizo el archivo de stock con el array stock actualizado:
                        file_put_contents(RUTA_ARCHIVO, serialize($stock));
                    }//if  
                    // Restablecer las cantidades a cero en la sesión:
                    $_SESSION[$nombre] = 0;
                }//foreach
                ?>   
            </table>
            <!-- Muestro los totales del carrito almacenados en la sesión. -->
            <p>Total de unidades en el carrito: <?php echo $_SESSION['totalUds']; ?></p>
            <hr>
            <p><b>Precio total de la compra: <?php echo $_SESSION['totalPrecio']; ?> €</b></p>
            <hr>
            <!-- y añado un enlace hacia el carrito de la compra para volver al carrito: -->
            <a href="carritoCompra.php">[Volver a comprar]</a>
            <?php   
            // Y vuelvo a mostar el stock disponible, ahora actualizado después de la compra:           
            echo "<h3>Stock disponible (precios y uds): </h3><ol>";
            foreach ($stock as $nombre => $unidades){
                $precio = $productos[$nombre];
                echo "<li>$nombre ($precio € /pack): $unidades uds.</li>";       
            }
            echo "</ol>";

            // borro valores de las variables poniendolas a 0:
            $_SESSION['totalUds'] = 0;
            $_SESSION['totalPrecio'] = 0; 
        } //else
        ?> 
    </body>
</html>
