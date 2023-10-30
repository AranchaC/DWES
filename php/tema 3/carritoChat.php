<?php
session_start();

$productos = array("peras" => 3, "limones" => 6, "manzanas" => 4);

if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = array();
    foreach ($productos as $producto => $precio) {
        $_SESSION['productos'][$producto] = 0;
    }
}

if (isset($_POST["actualizar"])) {
    $totalUds = 0;
    
    foreach ($productos as $nombre => $precio) {
        $uds_add = intval($_POST[$nombre . "_add"]);
        $uds_remove = intval($_POST[$nombre . "_remove"]);

        $_SESSION['productos'][$nombre] += $uds_add - $uds_remove;
        $totalUds += $_SESSION['productos'][$nombre];
    }
    $_SESSION['totalUds'] = $totalUds;
}

?>

<html>
    <head>
        <title>Carrito Compra</title>
    </head>
    <body>
        <h1>FRUTERÍA CHICHARRO</h1>
        <h2>CARRO DE LA COMPRA</h2>
        <form action="" method="POST">
            <table border="1">
                <tr>
                    <th>Producto</th>
                    <th>Añade Uds</th>
                    <th>Quitar Uds</th>
                    <th>Total unidades</th>
                    <th>Total precio</th>
                </tr>
            
            <?php
                foreach ($productos as $producto => $precio) {                   
            ?>
                    <tr>
                        <td>
                            <label for="<?php echo $producto ?>"><?php echo "$producto ($precio €/ud)" ?></label>
                        </td>
                        <td>
                            <input type="number" name="<?php echo $producto . "_add" ?>" min="0" value=0 /> 
                        </td>  
                        <td>
                            <input type="number" name="<?php echo $producto . "_remove" ?>" min="0" value=0 />
                        </td>
                        <td>
                            <?php echo isset($_SESSION['productos'][$producto]) ? $_SESSION['productos'][$producto] : 0; ?>
                        </td>
                        <td>
                            <?php echo isset($_SESSION['productos'][$producto]) ? ($_SESSION['productos'][$producto] * $precio) : 0; ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <br>
        
            <p>Total de unidades en el carrito: <?php echo isset($_SESSION['totalUds']) ? $_SESSION['totalUds'] : 0; ?></p>
            <p>Precio total a pagar: <?php echo isset($totalPrecio) ? $totalPrecio : 0; ?> €</p>

            <input type="submit" name="actualizar" value="Actualizar carrito">
            <input type="submit" name="terminar" value="Terminar compra">
        </form>
    </body>
</html>
