<?php
session_start();

include('stock.php');

// Variable para rastrear si hay productos sin stock:
$sinStock = false; 
//recorro array stock, y comparo las uds de la sesión,
//que son las enviadas al actualizar con las uds del stock.
//(al hacerlo con foreach, se hace la comprarción producto por producto.)
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
        <h1>FRUTERÍA CHICHARRO</h1>

        <?php 
        
        //si no hay stock de algo, mensaje de error:
        if ($sinStock) {
            echo "<h3>No hay suficiente stock para completar la compra.</h3>";
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
                            
                            // Actualizar el archivo de stock
                            file_put_contents(RUTA_ARCHIVO, serialize($stock));
                        }//if  
                        // Restablecer las cantidades a cero en la sesión:
                        $_SESSION[$nombre] = 0;
                    }//foreach
                    ?>
                    
                </table>
                    <p>Total de unidades en el carrito: <?php echo isset($_SESSION['totalUds']) ? $_SESSION['totalUds'] : 0; ?></p>
                    <hr>
                    <p><b>Precio total de la compra: <?php echo isset($_SESSION['totalPrecio']) ? $_SESSION['totalPrecio'] : 0; ?> €</b></p>
                    <hr>
                    <?php   
                    
                    echo "<h3>Stock disponible (precios y uds): </h3><ol>";
                        foreach ($productos as $producto => $precio){
                            if (isset($stock[$producto])){
                                $cantidad = $stock[$producto];
                                echo "<li>$producto ($precio € /ud): $cantidad uds.</li>"; 
                            } //if                  
                        } //foreach
                        echo "</ol>";

                    $_SESSION['totalUds'] = 0;
                    $_SESSION['totalPrecio'] = 0; 

            } //else

        
        ?>
         
            <a href="carritoCompra.php">[Volver a comprar]</a>

    </body>
</html>
