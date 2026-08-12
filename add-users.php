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
$uname=$_POST['uname'];
$designation=$_POST['designation'];
$uadd=$_POST['uadd'];
$mobilenumber=$_POST['mobilenumber'];
$email=$_POST['email'];
$compcat =$_POST['compcat'];
$cname=$_POST['cname'];
$comploc=$_POST['comploc'];
$idproof=$_POST['idproof'];
$assdadmin =$_POST['assdadmin'];
$entryid=mt_rand(100000000, 999999999);

$query=mysqli_query($con,"insert into tblusers(EntryID,UserName,Designation,UserAddress,MobileNumber,Email, DeviceCategory ,Device,DeviceLocation, IDProof, Assigned_Admin) value('$entryid','$uname', '$designation', '$uadd','$mobilenumber','$email', '$compcat','$cname', '$comploc','$idproof', '$assdadmin' )");

if ($query) {
echo '<script>alert("User Detail has been added.")</script>';
echo "<script>window.location.href ='add-users.php'</script>";

}
else
{
echo '<script>alert("Something Went Wrong. Please try again.")</script>';       
}


}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>

<title>Get Ready User</title>


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
<h1>Get Ready User</h1>
</div>
</div>
</div>
<div class="col-sm-8">
<div class="page-header float-right">
<div class="page-title">
<ol class="breadcrumb text-right">
<li><a href="dashboard.php">Dashboard</a></li>
<li><a href="add-users.php">Get Ready User</a></li>
<li class="active">Ready</li>
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
<div class="card-header"><strong>Ready-</strong><small>User Info</small></div>
<form name="computer" method="post" action="">
<p style="font-size:16px; color:red" align="center"> <?php if($msg){
echo $msg;
}  ?> </p>
<div class="card-body card-block">

<div>
<div class="form-group"><label for="city" class=" form-control-label">User Name :</label><select type="text" name="uname" id="uname" value="" class="form-control" required="true">
<option value="">Select User</option>
<?php $query=mysqli_query($con,"select DISTINCT UserName from  tbldevices");
while($row=mysqli_fetch_array($query))
{
?>    
<option value="<?php echo $row['UserName'];?>"><?php echo $row['UserName'];?></option>
<?php } ?>  
</select></div>
</div>

<div>
<div class="form-group"><label for="city" class=" form-control-label">Designation :</label><select type="text" name="designation" id="designation" value="" class="form-control" required="true">
<option value="">Select Designation</option>
<?php $query=mysqli_query($con,"select DISTINCT Designation from  tbldevices");
while($row=mysqli_fetch_array($query))
{
?>    
<option value="<?php echo $row['Designation'];?>"><?php echo $row['Designation'];?></option>
<?php } ?>  
</select></div>
</div>

<div class="form-group"><label for="street" class=" form-control-label">User Address :</label><input type="text" name="uadd" value="" id="uadd" class="form-control" required="true"></input></div>
<div class="row form-group">
<div class="col-12">
<div class="form-group"><label for="city" class=" form-control-label">Mobile Number :</label><input type="text" name="mobilenumber" id="mobilenumber" value="" class="form-control" required="true" maxlength="10" pattern="[0-9]+"></div>
</div>
<div class="col-12">
<div class="form-group"><label for="city" class=" form-control-label">Email :</label><input type="email" name="email" id="email" value="" class="form-control" required="true"></div>
</div>


<div class="col-12">
<div class="form-group"><label for="city" class=" form-control-label">Device Category:</label><select type="text" name="compcat" id="compcat" value="" class="form-control" required="true">
<option value="">Select Device</option>
<?php $query=mysqli_query($con,"select DISTINCT DeviceCategory from  tbldevices");
while($row=mysqli_fetch_array($query))
{
?>    
<option value="<?php echo $row['DeviceCategory'];?>"><?php echo $row['DeviceCategory'];?></option>
<?php } ?>  
</select></div>
</div>


<div class="col-12">
<div class="form-group"><label for="city" class=" form-control-label">Brand (Model) Selection:</label><select type="text" name="cname" id="cname" value="" class="form-control" required="true">
<option value="">Select Brand (Model) </option>
<?php $query=mysqli_query($con,"select DISTINCT Device from  tbldevices");
while($row=mysqli_fetch_array($query))
{
?>    
<option value="<?php echo $row['Device'];?>"><?php echo $row['Device'];?></option>
<?php } ?>  
</select></div>
</div>






<div class="col-12">
<div class="form-group"><label for="city" class=" form-control-label">Device Location :</label><select type="text" name="comploc" id="comploc" value="" class="form-control" required="true">
<option value="">Select Location</option>
<?php $query=mysqli_query($con,"select DISTINCT DeviceLocation from  tbldevices");
while($row=mysqli_fetch_array($query))
{
?>    
<option value="<?php echo $row['DeviceLocation'];?>"><?php echo $row['DeviceLocation'];?></option>
<?php } ?>  
</select></div>
</div>





<div class="col-12">
<div class="form-group"><label for="city" class=" form-control-label" >ID Proof :</label><input type="text" name="idproof" id="idproof" value="" class="form-control" required="true" placeholder="Type Initial"></div>
</div>


<div class="col-12">
<div class="form-group"><label for="city" class=" form-control-label">Devices Assigned By Admin : </label><input type="text" name="assdadmin" id="assdadmin" value="<?php echo $name; ?>" class="form-control" required="true"></div>
</div>

</div>



</div>




<div class="card-footer">
<p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
<i class="fa fa-dot-circle-o"></i>  Ready
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