<?php
    header( "Content-Type: application/json"); 
    session_start();
    include("function.php");
    $userId = $_SESSION['user']['id_membre'];
    $content = $_POST['content'];
    $result = insertPublication($userId, $content);
    $publications = getPublications();
    $retour = array();
    if($publications && $publications->num_rows > 0) {
        while($row = $publications->fetch_assoc()) {
            $retour[] = $row;
        }
    } else {
        $retour[] = ["message" => "No publications found"];
    }
    echo json_encode($retour);
    // if($result) {
    //     $response = array("status" => "success", "message" => "Publication successful");
    //     echo json_encode($response);
    // } else {
    //     $response = array("status" => "error", "message" => "Publication failed");
    //     echo json_encode($response);
    // }
?>