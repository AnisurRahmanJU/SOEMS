<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ccmsaid']==0)) {
header('location:logout.php');
} else{
if(isset($_POST['submit']))
{

$cid=$_GET['upid'];
$remark=$_POST['remark'];
$status=$_POST['status'];
$outtime=$_POST['outtime'];
$totalhrs=$_POST['totalhrs'];
$orepmt=$_POST['orepmt'];

$query=mysqli_query($con, "update  tblusers set Remark='$remark',Status='$status', OtherRequipments='$orepmt' where ID='$cid'");
if ($query) {
echo '<script>alert("Details updated")</script>';
echo "<script>window.location.href ='manage-olduser.php'</script>";
}
else
{
$msg="Something Went Wrong. Please try again";
}


} 

?>

<!doctype html>
<html class="no-js" lang="en">

<head>

<title> Deploy Users</title>


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
<h1>View Deploy User</h1>
</div>
</div>
</div>
<div class="col-sm-8">
<div class="page-header float-right">
<div class="page-title">
<ol class="breadcrumb text-right">
<li><a href="dashboard.php">Dashboard</a></li>
<li><a href="manage-olduser.php">Deployed Users</a></li>
<li class="active">View Deploy User</li>
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
<div class="card-header"><strong>View Deploy User</strong> </div>

<p style="font-size:16px; color:red" align="center"> <?php if($msg){
echo $msg;
}  ?> </p>
<div class="card-body card-block">
<?php
$cid=$_GET['upid'];
$ret=mysqli_query($con,"select * from tblusers where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>                       

<table border="1" class="table table-bordered mg-b-0">

<tr>
<th>Entry ID</th>
<td><?php  echo $row['EntryID'];?></td>
</tr>                             
<tr>
<th>User Name</th>
<td><?php  echo $row['UserName'];?></td>
</tr>

<tr>
<th>Designation</th>
<td><?php  echo $row['Designation'];?></td>
</tr>

<tr>
<th>User Address</th>
<td><?php  echo $row['UserAddress'];?></td>
</tr>
<tr>
<th>Mobile Number</th>
<td><?php  echo $row['MobileNumber'];?></td>
</tr>
<tr>  
<th>Email</th>
<td><?php  echo $row['Email'];?></td>
</tr>
<tr>
<th>Device</th>
<td><?php  echo $row['DeviceCategory'];?></td>
</tr>
<tr>
<th>Device Brand(Model)</th>
<td><?php  echo $row['Device'];?></td>
</tr>


<th>Device Location</th>
<td><?php  echo $row['DeviceLocation'];?></td>
</tr>



<tr>
<th>ID Proof</th>
<td><?php  echo $row['IDProof'];?></td>

</tr>                          

<tr>
<th>Ready Time</th>
<td><?php echo $row['ReadyTime'];?></td>
</tr>

<tr>
<th>Device Assigned By</th>
<td><?php echo $row['Assigned_Admin'];?></td>
</tr>

<tr>
<th>Status</th>
<td> <?php  
if($row['Status']=="")
{
echo "Not Deployed Yet";
}
if($row['Status']=="Out")
{
echo "Deployed";
}

;?></td>
</tr>
</table>
</div>




</div>
</table>
<table class="table mb-0">

<?php if($row['Status']==""){ ?>


<form name="submit" method="post" enctype="multipart/form-data"> 

<tr>
<th>Remark :</th>
<td>
<textarea name="remark" placeholder="" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
</tr>

<tr>
<th>Others requipments</th>
<td>
<input type="text" name="orepmt" id="orepmt" class="form-control wd-450" >
</td></tr>

<tr>
<th>Status :</th>
<td>
<select name="status" class="form-control wd-450" required="true" >
<option value="Out">Deployed</option>
</select></td>
</tr>

<tr align="center">
<td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Deployed</button></td>
</tr>
</form>
<?php } else { ?>
<table border="1" class="table table-bordered mg-b-0">
<tr>
<th>Remark</th>
<td><?php echo $row['Remark']; ?></td>
</tr>
<tr>
<tr>
<th>Deployed Time</th>
<td><?php echo $row['DeployedTime']; ?></td>
</tr>


<tr>
<th>Others requipments</th>
<td><?php echo $row['OtherRequipments']; ?></td>
</tr>

<tr>
<th>Updation Date</th>
<td><?php echo $row['UpdationDate']; ?>  </td></tr>
<?php } ?>
</table>






<?php } ?>

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
