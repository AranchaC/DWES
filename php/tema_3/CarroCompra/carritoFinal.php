<?php
session_start();

include('carrito.php');

?>

<html>
    <head>
        <title>Carrito Compra</title>
    </head>
    <body>
        <h1>FRUTERÍA CHICHARRO</h1>
        <h2>CARRO DE LA COMPRA</h2>
        <?php 

            

            echo "<h3>Resumen de la compra:</h3>";
            foreach ($productos as $nombre => $precio) {
                // solo se mostrarán los productos con más de 0 uds.
                if ($_SESSION[$nombre] > 0){
                    echo "$nombre - $_SESSION[$nombre] uds.<br />";
                }
     
                    $_SESSION[$nombre] = 0;
                   
                
            };?>
            <p>Total de unidades en el carrito: <?php echo isset($_SESSION['totalUds']) ? $_SESSION['totalUds'] : 0; ?></p>
            <p>Precio total a pagar: <?php echo isset($_SESSION['totalPrecio']) ? $_SESSION['totalPrecio'] : 0; ?> €</p>
            <?php          
            $_SESSION['totalUds'] = 0;
            $_SESSION['totalPrecio'] = 0; 

            $restarStock = 0;
    
            foreach ($stock as $producto => $cantidad) {
                $stock[$producto] -= $restarStock;
            }
            file_put_contents(RUTA_ARCHIVO,serialize($stock));

            ?>
            <a href="carritoCompra.php">[Volver a comprar]</a>

    </body>
</html>
