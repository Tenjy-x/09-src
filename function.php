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
    $sql = "SELECT * FROM Publication";
    $result = mysqli_query(dbConnect(), $sql);
    return $result;
  }

  function getComments($id_pub) {
    $sql = "SELECT * FROM Publication WHERE id_pub = '$id_pub'";
    $result = mysqli_query(dbConnect(), $sql);
    return $result;
  }
?>