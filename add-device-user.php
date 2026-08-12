<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ccmsaid']==0)) {
header('location:logout.php');
} else{
if(isset($_POST['submit']))
{

$cmsaid=$_SESSION['ccmsaid'];
$compcat=$_POST['compcat'];
$compname=$_POST['compname'];
$stag=$_POST['stag'];
$uname=$_POST['uname'];
$designation=$_POST['designation'];
$comploc=$_POST['comploc'];
$idadd=$_POST['idadd'];


$query=mysqli_query($con,"insert into tbldevices(DeviceCategory, Device, ServiceTag, UserName, Designation, DeviceLocation, Assigned_Admin) value('$compcat','$compname', '$stag', '$uname', '$designation', '$comploc','$idadd')");

if ($query) {
echo '<script>alert("Computer Detail has been added.")</script>';
echo "<script>window.location.href ='add-computer.php'</script>";
}
else
{
echo '<script>alert("Something Went Wrong. Please try again")</script>';
}


}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>

<title>Add Device & User </title>


<link rel="apple-touch-icon" href="apple-icon.png">


<link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
<link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

<link rel="stylesheet" href="assets/css/style.css">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
<!-- Left Panel -->

<?php include_once('includes/sidebar.php');?>

<div id="right-panel" class="right-panel">

<!-- Header-->
<?php include_once('includes/header.php');?>

<div class="breadcrumbs">
<div class="col-sm-4">
<div class="page-header float-left">
<div class="page-title">
<h1>Device & User </h1>
</div>
</div>
</div>
<div class="col-sm-8">
<div class="page-header float-right">
<div class="page-title">
<ol class="breadcrumb text-right">
<li><a href="dashboard.php">Dashboard</a></li>
<li><a href="add-device-user.php">Device & User</a></li>
<li class="active">Add</li>
</ol>
</div>
</div>
</div>
</div>

<div class="content mt-3">
<div class="animated fadeIn">


<div class="row">
<div class="col-lg-6">
<!-- .card -->

</div>
<!--/.col-->

<div class="col-lg-12">
<div class="card">
<div class="card-header"><strong>Device & User <small> Details</small> </strong></div>
<form name="computer" method="post" action="">
<p style="font-size:16px; color:red" align="center"> <?php if($msg){
echo $msg;
}  ?> </p>
<div class="card-body card-block">



<div>
<div class="form-group"><label for="city" class=" form-control-label">Device Category :</label><select type="text" name="compcat" id="compcat" value="" class="form-control" required="true">
<option>Select Device</option>
<option> Desktop</option>
<option>Laptop </option>
<option>Monitor</option>
<option>Printer </option>
<option>Scaner</option>
<option>IP Phone</option>
<option>Speaker</option>
<option>UPS</option>
<option>Multiplug</option>
<option>Projector/Multimedia</option>




</select></div>
</div>





<div class="form-group"><label for="company" class=" form-control-label">Device Brand (Model):</label><input type="text" name="compname" value="" class="form-control" id="compname" required="true"></div>
<div class="form-group"><label for="company" class=" form-control-label">Service Tag :</label><input type="text" name="stag" value="" class="form-control" id="stag" required="true"></div> 
<div class="form-group"><label for="street" class=" form-control-label">Add User Name :</label><input type="text" name="uname" value="" id="uname" class="form-control" required="true"></div>
<div class="form-group"><label for="street" class=" form-control-label">Designation :</label><input type="text" name="designation" value="" id="designation" class="form-control" required="true"></div>
<div class="form-group"><label for="street" class=" form-control-label"> Device Location :</label><input type="text" name="comploc" value="" id="comploc" class="form-control" required="true"></div>
<div class="row form-group">
<div class="col-12">
<div class="form-group"><label for="city" class=" form-control-label">Devices Assigned By Admin : </label><input type="text" name="idadd" id="idadd" value="<?php echo $name; ?>" class="form-control" required="true"></div>
</div>

</div>

</div>

<div class="card-footer">
<p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
<i class="fa fa-dot-circle-o"></i>  Add
</button></p>

</div>
</div>
</form>
</div>




</div>
</div><!-- .animated -->
</div><!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->


<script src="vendors/jquery/dist/jquery.min.js"></script>
<script src="vendors/popper.js/dist/umd/popper.min.js"></script>

<script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
<?php }  ?>