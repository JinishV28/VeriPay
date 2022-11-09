<?php
    require "dbconnection.php";
    session_start();

    $username = $_SESSION['username'];
    $amount = $_POST['amt'];
    $type = $_POST['type'];
    $category = $_POST['category'];
    $date = date("Y/m/d");
    $success = array(0,0);

    if($type == "Bill")
    {
        $customer_id = $_POST['customer_id'];
        $sql = $conn->prepare("INSERT INTO expenses(username, date, amount, type, category, customer_id) VALUES (?,?,?,?,?,?)");
        $sql->bind_param("ssssss", $username, $date, $amount, $type, $category, $customer_id);
        $sql->execute();
        $success[0] = 1;
    }
    else
    {
        $sql = $conn->prepare("INSERT INTO expenses(username, date, amount, type, category) VALUES (?,?,?,?,?)");
        $sql->bind_param("sssss", $username, $date, $amount, $type, $category);
        $sql->execute();
        $success[0] = 1;
    }
    echo json_encode($success);
?>