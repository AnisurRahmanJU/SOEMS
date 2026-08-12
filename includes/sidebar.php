<aside id="left-panel" class="left-panel">
<nav class="navbar navbar-expand-sm navbar-default">
<?php
$adminid=$_SESSION['ccmsaid'];
$ret=mysqli_query($con,"select AdminName from tbladmin where ID='$adminid'");
$row=mysqli_fetch_array($ret);
$name=$row['AdminName'];

?>
<div class="navbar-header">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
<i class="fa fa-bars"></i>
</button> 
<a class="navbar-brand" href="dashboard.php">SOEMS ADMIN | <?php echo $name; ?></a>

</div>

<div id="main-menu" class="main-menu collapse navbar-collapse">
<ul class="nav navbar-nav">
<li class="active">
<a href="dashboard.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
</li>


<li class="menu-item-has-children dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Devices & User</a>
<ul class="sub-menu children dropdown-menu">
<li><i class="fa fa-user-plus"></i><a href="add-device-user.php">Add Devices & User</a></li>
<li><i class="fa fa-user-plus"></i><a href="manage-device-user.php">Edit Devices & Users</a></li>
</ul>
</li>




<li class="menu-item-has-children dropdown">
<a href="add-users.php" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Deployment</a>
<ul class="sub-menu children dropdown-menu">
<li><i class="fa fa-user-plus"></i><a href="add-users.php">Get Ready User</a></li>
<li><i class="fa fa-user-plus"></i><a href="manage-newusers.php">Ready To Deploy</a>
</li>
<li><i class="fa fa-user-plus"></i><a href="manage-olduser.php">View Deployed Users</a>
</li>

</ul>
</li>


<li class="active">
<a href="search.php"> <i class="menu-icon fa fa-search"></i>Search </a>
</li>
<li class="menu-item-has-children dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Reports</a>
<ul class="sub-menu children dropdown-menu">
<li><i class="fa fa-calendar"></i><a href="bwdates-report-ds.php">Between Dates Report</a></li>
<li><i class="fa fa-history"></i><a href="history.php">History Of Issued Date</a></li>

</ul>
</li>


<li class="menu-item-has-children dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i><b>User Problems Maintain</b></a>
<ul class="sub-menu children dropdown-menu">
<li><i class="fa fa-paper-plane-o"></i><a href="#">Problems Solving Request</a></li>
<li><i class="fa fa-wpforms"></i><a href="#">Requisition</a></li>

</ul>
</li>




</ul>
</div><!-- /.navbar-collapse -->
</nav>


</ul>
</li>
</aside>