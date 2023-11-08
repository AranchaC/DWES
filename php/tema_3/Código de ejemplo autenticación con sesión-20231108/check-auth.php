<?php
session_start();
if (! isset($_SESSION["authok"])
    || $_SESSION["authok"] != 1 )
{
    header("Location: index.php?redir=si");
    exit();
}
?>
