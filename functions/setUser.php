<?php
//Thomas
// Etape 1 : config database
$DB_HOST = "localhost";
$DB_NAME = "tincat";
$DB_USER = "root";
$DB_PASSWORD = "";



// Etape 2 : Connexion to database
try {
    $db = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
var_dump($_POST);
// Avant d'insérer en base de données faire les vérifications suivantes
// Vérifier si le pseudo ou le mot de passe est vide
if(empty($_POST["password"])){
    echo "<h1>Mot de passe invalide</h1>";
    //action 
}elseif($_POST["password"] != $_POST["confirmPassword"]){
    // Ajouter un input confirm password et vérifier si les deux sont égaux
    echo "<h1>Mdp de confirmation non valide</h1>";
}elseif(empty($_POST["email"])){
    // vérifie le champ email
    echo "<h1>email invalide</h1>";
}elseif(empty($_POST["pseudo"])){
    // vérifie le champ pseudo
    echo "<h1>pseudo invalide</h1>";
}else{
    echo "<h1>Inscription confirmé</h1>";
// Etape 3 : prepare request
    $req = $db->prepare("INSERT INTO users (pseudo, password, email) VALUES(:pseudo, :password, :email)");
    $req->bindParam(":pseudo", $_POST["pseudo"]);
    $req->bindParam(":password", $_POST["password"]);
    $req->bindParam(":email", $_POST["email"]);
    $req->execute();
}

