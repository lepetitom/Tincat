<?php
require("head.php");
    //si session pseudo vide
        //redirige vers login
    if(empty($_SESSION)){
        header("Location: login.php");
    }
?>

<a href="functions/disconnect.php">Disconnect</a>

<?php
echo "Bonjour " . $_SESSION["pseudo"];