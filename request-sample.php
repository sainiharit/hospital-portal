<?php
	
	include 'header.php';

	$blood_id = $_GET['blood_id'];
	$license = $_GET['license'];
	$phone = $_SESSION['phone'];
	$id = rand();

	$sql = "INSERT INTO requests (request_id, receiver_id, blood_id, license) VALUES ('$id', '$phone', '$blood_id', '$license')";

	if ($conn->query($sql) === TRUE) 
	  {
	  	$_SESSION['phone'] = $phone;
	  	echo "<script> alert('Blood Sample Request Generated');  window.location.href='view-sample.php'; </script>";
	  } else 
	  {
	    echo "<script type='text/javascript'> alert('Error Requesting Sample! Please Try again later')</script>";
	  }

?>