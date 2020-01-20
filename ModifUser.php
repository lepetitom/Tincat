<?php 
    require("head.php");
    //si session pseudo vide
        //redirige vers login
    if(empty($_SESSION)){
        header("Location: login.php");
    }

$id = $_GET["id"];


   
?>

<body>
    <div class="containt">
        <div class="middle">
            <div class="form-container">
                <h1>TINCAT</h1>
                <form action="functions/UptadeUser.php?id=<?php echo $id ?>" method="post">
                    <input type="text" placeholder="pseudo" name="pseudo" value="<?php echo $_GET["pseudo"]?>">
                    <input type="submit" value="Modifier">
                    <div class="message">
                        <?php
                            if( isset($_GET["message"])){
                                echo $_GET["message"];
                            }
                        ?>
                    </div>
                </form>
            </div>

        </div>

    </div>

</body>
</html>