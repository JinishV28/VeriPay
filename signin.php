<?php
    require 'dbconnection.php';
    session_start();
    
    $username = $_POST['uname'];
    $password = $_POST['psw'];
    $sql = "Select * from signup_info where(username='$username')";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    $success = array(0,0);
    if($count==1)
    {
        $sql = "Select * from signup_info where(password='$password')";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        if($count==1)
        {
            $_SESSION['firstname'] = $row[0];
            $_SESSION['lastname'] = $row[1];
            $_SESSION['monthly_inc'] = $row[2];
            $_SESSION['phoneno'] = $row[3];
            $_SESSION['email'] = $row[5];
            $_SESSION['username'] = $username;
            $success[0] = 1;
        }
        else
        {
            $success[1] = 1;
        }
    }
    else
    {
        $success[1] = 2;
    }
    echo json_encode($success);
    $conn->close();
?>