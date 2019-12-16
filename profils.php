<?php
require("head.php");
    //si session pseudo vide
        //redirige vers login
    if(empty($_SESSION)){
        header("Location: login.php");
    }
?>

<a href="functions/disconnect.php">Disconnect</a>

<!-- *************************************************** -->
<!-- Afficher les utilisateurs stocké dans le BDD sauf moi -->
<!-- *************************************************** -->
<
<?php
require("functions/database.php");
$sth = $db->prepare("SELECT pseudo FROM users");
$sth->execute();

/* Récupération de toutes les lignes d'un jeu de résultats */
print("Récupération de toutes les lignes d'un jeu de résultats :\n");
$result = $sth->fetchAll();
var_dump($result);


echo "Bonjour " . $_SESSION["pseudo"];
?>
