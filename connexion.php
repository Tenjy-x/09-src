<?php
function dbConnect() {
    $bdd = mysqli_connect("localhost" , "root" , "" , "Ajax");
    if (!$bdd) {
        die("Erreur de connexion : " . mysqli_connect_error());
    }
    return $bdd;
}
    // echo "Connexion réussie à la base de données !";
?>