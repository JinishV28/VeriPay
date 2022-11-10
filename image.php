<?php
    require "dbconnection.php";
    session_start();
    
    $username = $_SESSION['username'];
    $data = json_decode(file_get_contents('php://input'), true);
    $image = $data['img'];
    $sql = $conn->prepare("UPDATE signup_info SET img='$image' WHERE username='$username';");
    $sql->execute();
?>
