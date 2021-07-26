<?php
include 'header.php';
$blood_id = $_GET['blood_id'];
$status = $_GET['status'];

    $sql = "UPDATE samples SET status = '$status' WHERE blood_id = $blood_id";
    if ($conn->query($sql) === TRUE) 
    {
        echo "<script>alert('Request Approved'); </script>";
        echo "<script>window.location.href='create-sample.php';</script>";
        // header('Location:create-sample.php');
    }

?>