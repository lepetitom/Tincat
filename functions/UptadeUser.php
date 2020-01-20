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
        $id = $_GET["id"];
        $pseudo = $_GET["pseudo"];
        if ( empty($_POST["pseudo"])){
            $message = "Vous devez remplir un pseudo";
            header("Location: ../ModifUser.php?pseudo=$pseudo&id=$id&message=$message");
        }
        else {

            // Connect to database
            require("database.php");
            // prepare request (select)
            $sth = $db->prepare("UPDATE users set pseudo = :pseudo where id = :id");
            $sth->bindParam(":pseudo", $_POST["pseudo"]);
            $sth->bindParam(":id", $_GET["id"]);
        
            //$sth->bindParam(":id", $_SESSION["id"]);
            // execute
            $sth->execute();
            /* Récupération de toutes les lignes d'un jeu de résultats
            print("Récupération de toutes les lignes d'un jeu de résultats :\n");
            $result = $sth->fetchAll();  */
        
            header("Location: ../profils.php");
        }

    ?>
</div>