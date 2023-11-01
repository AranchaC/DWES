<?php

include "stock.php";
	echo "<p>Stock:</p><ol>";
	foreach ($stock as $producto => $cantidad)
		echo "<li>$producto - $cantidad</li>";
	echo "</ol>";
?>
