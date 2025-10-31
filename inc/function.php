<?php
  require("connexion.php");
  function getUser($name,$pwd) {
    $sql = "Select * from Membre where Nom='$name' AND Pwd='$pwd'";
    $result = mysqli_query(dbConnect(), $sql);
    return mysqli_fetch_assoc($result);
  }

  function insertPublication($userId , $content) {
    $sql = "INSERT INTO Publication (id_membre, texte) VALUES ('$userId', '$content')";
    $result = mysqli_query(dbConnect(), $sql);
    return $result;
  }

  function getPublications() {
    $sql = "SELECT * FROM Publication JOIN Membre ON Publication.id_membre = Membre.id_membre" ;
    $result = mysqli_query(dbConnect(), $sql);
    return $result;
  }

  function getComments($id_pub) {
    $sql = "SELECT * FROM Commentaire JOIN Membre ON Commentaire.id_membre = Membre.id_membre WHERE id_pub = '$id_pub'";
    $result = mysqli_query(dbConnect(), $sql);
    return $result;
  }

  function insertComment($userId , $id_pub, $comment) {
    $sql = "INSERT INTO Commentaire (id_membre, id_pub, coms) VALUES ('$userId', '$id_pub', '$comment')";
    $result = mysqli_query(dbConnect(), $sql);
    return $result;
  }
?>