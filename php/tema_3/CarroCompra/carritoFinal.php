<?php
session_start();

include('stock.php');

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
            echo "<ul>";
            foreach ($productos as $nombre => $precio) {
                // solo se mostrarán los productos con más de 0 uds.
                if ($_SESSION[$nombre] > 0){
                    
                    echo "<li>$nombre: $_SESSION[$nombre] uds.</li>";
                }  
                // Restablecer las cantidades a cero en la sesión:
                $_SESSION[$nombre] = 0;
            };?>
            </ul>
            <p>Total de unidades en el carrito: <?php echo isset($_SESSION['totalUds']) ? $_SESSION['totalUds'] : 0; ?></p>
            <p><b>Precio total a pagar: <?php echo isset($_SESSION['totalPrecio']) ? $_SESSION['totalPrecio'] : 0; ?> €</b></p>
            <?php   
            
            echo "<h2>Stock disponible (precios y uds): </h2><ol>";
                foreach ($productos as $producto => $precio){
                    if (isset($stock[$producto])){
                        $cantidad = $stock[$producto];
                        echo "<li>$producto - $precio € /ud - $cantidad uds.</li>"; 
                    }
                    
                }
                echo "</ol>";

            $_SESSION['totalUds'] = 0;
            $_SESSION['totalPrecio'] = 0; 

            ?>
            <a href="carritoCompra.php">[Volver a comprar]</a>

    </body>
</html>
