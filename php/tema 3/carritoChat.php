<?php
session_start();

$productos = array("peras" => 3, "limones" => 6, "manzanas" => 4);

if (isset($_POST["actualizar"])) {
    $totalUds = 0;
    $totalPrecio = 0;

    foreach ($productos as $nombre => $precio) {
        $uds_add = isset($_POST[$nombre . "_add"]) ? intval($_POST[$nombre . "_add"]) : 0;
        $uds_remove = isset($_POST[$nombre . "_remove"]) ? intval($_POST[$nombre . "_remove"]) : 0;
        $totalUds += $uds_add - $uds_remove;
        $totalPrecio += ($uds_add - $uds_remove) * $precio;
        $_SESSION['productos'][$nombre] = $uds_add - $uds_remove;
    }
    $_SESSION['totalUds'] = $totalUds;
}
?>

<html>
<head>
    <title>Carrito Compra</title>
</head>

<body>
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
                        <input type="number" name="<?php echo $producto . "_remove" ?>" max="0" value=0 />
                    </td>
                    <td>
                        <?php
                        $productoUds = isset($_SESSION['productos'][$producto]) ? $_SESSION['productos'][$producto] : 0;
                        echo $productoUds;
                        $totalUds += $productoUds;
                        ?>
                    </td>
                    <td>
                        <?php
                        $productoPrecio = $productoUds * $precio;
                        echo $productoPrecio;
                        $totalPrecio += $productoPrecio;
                        ?>
                    </td>
                </tr>
            <?php
            }//foreach ?>
        </table>
        <br>
        <input type="submit" name="actualizar" value="Actualizar carrito">
    </form>
    <p>Total de unidades en el carrito: <?php echo $totalUds; ?></p>
    <p>Precio total a pagar: <?php echo $totalPrecio; ?> €</p>
</body>

</html>
