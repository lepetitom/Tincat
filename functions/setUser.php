<?php
//Thomas
// Etape 1 : config database
require("database.php");

var_dump($_POST);
// Avant d'insérer en base de données faire les vérifications suivantes
// Vérifier si le pseudo ou le mot de passe est vide

$message = "";
if(empty($_POST["password"]) && empty($_POST["pseudo"]) ){
    $message = "Vous devez remplir les deux champs";
    header("Location: ../register.php?message=$message");
}else if ( empty($_POST["pseudo"]) || !empty($_POST["password"]) ){
    $message = "Vous devez remplir un pseudo";
    header("Location: ../register.php?message=$message");
}else if ( !empty($_POST["pseudo"]) && empty($_POST["password"]) ){
    $message = "Vous devez remplir un password";
    header("Location: ../register.php?message=$message");
}

var_dump ($message);

if( !empty($_POST["password"]) && !empty($_POST["confirmPassword"]) && !empty($_POST["pseudo"]) ){
    //confirmation password  
    if($_POST["password"] === $_POST["confirmPassword"]) {
        //Prepare request
        $req = $db->prepare("INSERT INTO users (pseudo, password, email) VALUES(:pseudo, :password, :email)");
        $req->bindParam(":pseudo", $_POST["pseudo"]);
        $req->bindParam(":password", $_POST["password"]);
        $req->bindParam(":email", $_POST["email"]);
        $req->execute();
        $message = "Success create account";
        header("Location: ../login.php?message=$message");
    }else{
        $message = "Password and confirPassword not egal";
        header("Location: ../register.php?message=$message");
    }
}


