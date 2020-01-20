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
<div class="users">

    <?php
    // Connect to database
    require("functions/database.php");
    // prepare request (select)
    $sth = $db->prepare("SELECT id, pseudo FROM users WHERE pseudo <> :pseudo");
    $sth->bindParam(":pseudo", $_SESSION["pseudo"]);
    //$sth->bindParam(":id", $_SESSION["id"]);
    // execute
    $sth->execute();
    /* Récupération de toutes les lignes d'un jeu de résultats
    print("Récupération de toutes les lignes d'un jeu de résultats :\n");
    $result = $sth->fetchAll();  */

    while($result = $sth->fetch(PDO::FETCH_ASSOC)){
        ?>
        <div>
            <strong>
                <?= 
                    "<h2>" . $result["pseudo"] . "</h2>"
                    ?>
            </strong>
            <a href="functions/deleteUser.php?id=<?php echo $result["id"];?>">Supprimer</a>
            <a href="ModifUser.php?id=<?php echo $result["id"];?>&pseudo=<?php echo $result["pseudo"];?>">modifier</a>
        </div>
    <?php
    }
    ?>

</div>

<?php echo "Bonjour " . $_SESSION["pseudo"]; ?>

