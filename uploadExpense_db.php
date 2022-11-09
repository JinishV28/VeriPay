<?php
    require "dbconnection.php"
    session_start();

    $username = $_SESSION['username'];
    $amount = $_POST['amt'];
    $type = $_POST['type'];
    $category = $_POST['category'];
    $customer_id = $_POST['customer_id'];
    $success = array(0,0);

    if($type == "Bill")
    {
        $sql = $conn->prepare("INSERT INTO expenses(username, amount, type, category, customer_id) VALUES (?,?,?,?,?)");
        $sql->bind_param("sssss", $username, $amount, $type, $category, $customer_id);
        $sql->execute();
        $success[0] = 1;
    }
    else
    {
        $sql = $conn->prepare("INSERT INTO expenses(username, amount, type, category) VALUES (?,?,?,?)");
        $sql->bind_param("ssss", $username, $amount, $type, $category);
        $sql->execute();
        $success[0] = 1;
    }
?>