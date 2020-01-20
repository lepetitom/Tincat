<?php
require("../head.php");
    //si session pseudo vide
        //redirige vers login
    if(empty($_SESSION)){
        header("Location: login.php");
    }
?>

<div class="users">

    <?php
    // Connect to database
    require("database.php");
    // prepare request (select)
    $sth = $db->prepare("DELETE FROM users WHERE id = :id");
    $sth->bindParam(":id", $_GET["id"]);

    //$sth->bindParam(":id", $_SESSION["id"]);
    // execute
    $sth->execute();
    /* Récupération de toutes les lignes d'un jeu de résultats
    print("Récupération de toutes les lignes d'un jeu de résultats :\n");
    $result = $sth->fetchAll();  */

    header("Location: ../profils.php");

    ?>
</div>