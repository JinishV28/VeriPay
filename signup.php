<?php
	require 'dbconnection.php';
	
	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$monthly_inc = $_POST['minc'];
	$phoneno = $_POST['phoneno'];
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
			$strongPassword = preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password);
			if($strongPassword)
			{
				if($password == $confirmPassword)
				{
					$hash = password_hash($password, PASSWORD_DEFAULT);
					$sql = $conn->prepare("INSERT INTO signup_info(first_name, last_name, monthly_income, phone_no, username, email, password) VALUES(?, ?, ?, ?, ?, ?, ?);");
					$sql->bind_param("sssssss", $firstname, $lastname, $monthly_inc, $phoneno, $username, $email, $hash);
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