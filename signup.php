<?php
	require 'dbconnection.php';
	
	$username = $_POST['uname'];
	$email = $_POST['email'];
	$password = $_POST['psw'];
	$confirmPassword = $_POST['confirmpsw'];
	
	$sql = "Select * from signup_info where email='$email'";
	$query = $conn->query($sql);
	$count = mysqli_num_rows($query);
	$success = array(0,0);
	if($count == 0)
	{
		$sql = "Select * from signup_info where username='$username'";
		$query = $conn->query($sql);
		$count2 = mysqli_num_rows($query);
		if($count2 == 0)
		{
			if(strlen($password) >= 8)
			{
				if($password == $confirmPassword)
				{
					$sql = $conn->prepare("INSERT INTO signup_info(username, email, password) VALUES(?, ?, ?);");
					$sql->bind_param("sss", $username, $email, $password);
					$sql->execute();
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
		}
		else
		{
			$success[1] = 3;
		}
	}
	else
	{
		$success[1] = 4;
	}
	echo json_encode($success);
	$conn->close();
?>