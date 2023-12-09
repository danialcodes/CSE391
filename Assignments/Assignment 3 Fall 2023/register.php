<?php

	require_once('DBconnect.php');
	session_start();
	$name = $_POST['name'];
	$sid = $_POST['sid'];
	$email = $_POST['email'];
	$slot = $_POST['slot'];
	$sql = "SELECT * from student where email = '$email'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result)){
		$sql = "UPDATE student SET slot='$slot' WHERE email = '$email'";
		if (mysqli_query($conn, $sql)) {
			$_SESSION['success'] = "<b>Slot Updated!!</b>";
			header("Location: index.php");
            return;

		} else {
			$_SESSION['error'] = "<b>Something Went wrong!!</b>";
			header("Location: index.php");
            return;
		}
	}
	else{
		$sql = " INSERT INTO student VALUES( '$name', '$sid', '$email', '$slot' ) ";
		$result = mysqli_query($conn, $sql);
		if(mysqli_affected_rows($conn)){
			$_SESSION['success'] = "<b>Slot Registered Successfully!!</b>";
			header("Location: index.php");
            return;
		}
		else{
			$_SESSION['error'] = "<b>Something Went wrong!!</b>";
			header("Location: index.php");
            return;
		}
		
	}
?>