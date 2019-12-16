<?php require "head.php"; ?>

<body>
    <div class="form-container">
        <h1>TINCAT</h1>
        <form action="functions/setUser.php" method="post">
            <input type="text" placeholder="pseudo" name="pseudo">
            <input type="email" placeholder="email" name="email">
            <input type="password" placeholder="password" name="password">
            <input type="Password" placeholder="confirmation password" name="confirmPassword">
            <input type="submit" value="register">
           
            <div class="message">
                <?php
                    if( isset($_GET["message"])){
                        echo $_GET["message"];
                    }
                ?>
            </div>
        </form>
    </div>

</body>
</html>
