<?php
  include("../inc/function.php");
  session_start();
  $id_pub = $_GET['id'];
  $userId = $_SESSION['user']['id_membre'];
  $insertion = insertComment($userId, $id_pub, $_POST['comment']);
  $comments = getComments($id_pub);
  $retour = array();
  if($comments && $comments->num_rows > 0) {
      while($row = $comments->fetch_assoc()) {
          $retour[] = $row;
      }
  } else {
      $retour[] = ["message" => "No comments found"];
  }
  echo json_encode($retour);
?>