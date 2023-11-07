<?php
 session_start();

 include ('stock.php');

 echo "<h3>Stock disponible (precios y uds): </h3><ol>";
 foreach ($stock as $nombre => $unidades){
     $precio = $productos[$nombre];
     echo "<li>$nombre ($precio € /pack): $unidades uds.</li>";       
 }
 echo "</ol>";


?>

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
                            <?php echo isset($_SESSION[$nombre]) ? $_SESSION[$nombre] : 0; ?>
                        </td>
                    </tr>
                <?php
                }//foreach 
                ?>  
                </table>
