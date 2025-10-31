<?php
  header( "Content-Type: application/json"); 
  include("../inc/function.php");
  session_start();
  $name=$_POST['name'];
  $pwd=$_POST['passwd'];
  $user=getUser($name,$pwd);
  if($user != null) {
    $_SESSION['user'] = $user;
    $response = array("status" => "success", "message" => "Login successful");
    echo json_encode($response);
  }else {
    $response = array("status" => "error", "message" => "Invalid name or password");
    echo json_encode($response);
  }
?>
