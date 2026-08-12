<?php
include('includes/dbconnection.php');
$id=$_REQUEST['id'];
$id=$_REQUEST['id'];
$query = "DELETE FROM tblusers WHERE id=$id and Status='Out'";
$result = mysqli_query($con,$query) or die ( mysqli_error()); 
header("Location: manage-olduser.php"); 
?>