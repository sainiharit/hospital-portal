<?php
include 'header.php';
$request_id = $_GET['request_id'];
$status = $_GET['status'];

    $sql = "UPDATE requests SET req_status = '$status' WHERE request_id = $request_id";
    if ($conn->query($sql) === TRUE) 
    {
        echo "<script>alert('Request Approved'); </script>";
        echo "<script>window.location.href='view-request.php';</script>";
        // header('Location:view-request.php');
    }

?>