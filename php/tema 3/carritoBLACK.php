<?php
session_start();

$productos = array(
    "peras" => 3,
    "limones" => 6,
    "manzanas" => 4
);

$unidades = isset($_POST['actualizar']) ? $_POST['unidades'] : 0;

if(isset($_POST['actualizar'])){
    $_SESSION['totalUds'] = $unidades;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Carrito de la compra</title>
</head>
<body>
<form method="post" action="">
    <input type="number" name="unidades" value="<?php echo $unidades; ?>">
    <input type="submit" name="actualizar" value="Actualizar">
</form>

<table>
    <tr>
        <th>Producto</th>
        <th>Unidades</th>
        <th>Total unidades</th>
        <th>Total precio</th>
    </tr>
    <?php
    foreach($productos as $nombre => $precio){
        echo '<tr>';
        echo '<td>'.$nombre.'</td>';
        echo '<td><input type="number" name="'.$nombre.'" value="0"></td>';
        echo '<td>'.$unidades.'</td>';
        echo '<td>'.($unidades * $precio).'</td>';
        echo '</tr>';
    }
    ?>
</table>
</body>
</html>