<html>
    <head>
    <!-- <meta http-equiv="refresh" content="5"> -->
    </head>
    <body>
        <table border="1">
            <?php 

                define("DEFAULTSIZE", 10);

                if (isset($_GET["n"])){
                    $n = $_GET["n"];
                } else {
                    $n = DEFAULTSIZE;
                }

                for ($i=1; $i<=$n; $i++){
                    echo "<tr>";

                    for ($j=1; $j<=$n; $j++){
                        echo "<td>", $i*$j, "</td>";
                    }
                    echo "</tr>";
                }

            ?>
        </table>
    </body>
    
</html>
