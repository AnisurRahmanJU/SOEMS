<?php
session_start();
error_reporting(0);
include('include/dbconnection.php');
$db = mysqli_connect('localhost', 'root', '', 'soemsdb');
// initializing variables
$adminname="";
$username = "";
$mobilenumber="";
$password ="";
$email    = "";
$errors = array(); 

// REGISTER USER
if (isset($_POST['signup'])) {
// receive all input values from the form
$adminname =$_POST['adminname'];
$username =$_POST['username'];
$mobilenumber=$_POST['mobilenumber'];
$email =$_POST['email'];
$password_1 =$_POST['password_1'];
$password_2 =$_POST['password_2'];

// form validation: ensure that the form is correctly filled ...
// by adding (array_push()) corresponding error unto $errors array
if (empty($username)) { array_push($errors, "Username is required"); }
if (empty($email)) { array_push($errors, "Email is required"); }
if (empty($password_1)) { array_push($errors, "Password is required"); }
if ($password_1 != $password_2) {
array_push($errors, "<h4>Warning!!! The confirm password doesn't match</h4>");
}



// first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM tbladmin WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }



// Finally, register user if there are no errors in the form
if (count($errors) == 0) {
$password = md5($password_1);//encrypt the password before saving in the database

$sql = "INSERT INTO tbladmin (AdminName,UserName,MobileNumber,Email, Password) 
VALUES('$adminname','$username', '$mobilenumber', '$email', '$password')";
mysqli_query($db, $sql);
$_SESSION['username'] = $username;
$_SESSION['success'] = "You are now logged in";
header('location: index.php');
}
}
?>

<!doctype html>
<html>
<head>

<title>Admin Sign up</title>


<link rel="apple-touch-icon" href="apple-icon.png">



<link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
<link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

<link rel="stylesheet" href="assets/css/style.css">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">
<div class="sufee-login d-flex align-content-center flex-wrap" >
<div class="container">
<div class="login-content">
<div class="login-logo">
<h3 style="color: white">Smart Office Equipments Management System </h3>
<hr color="red"/>
</div>
<div class="login-form"> 

<form action="signup.php" method="post">
<?php include('errors.php'); ?>

<div class="form-group">
<label><b>Admin Full Name:</b></label>
<input type="text" class="form-control" placeholder="Full Name" required="true" name="adminname" id="adminname">
</div>
<div class="form-group">
<label><b>User Name (Use for login):</b> </label>
<input type="text" class="form-control" placeholder="User Name" name="username" required="true" id="username">
</div>

<div class="form-group">
<label><b>Mobile Number:</b></label>
<input type="text" class="form-control" placeholder="Mobile Number" name="mobilenumber" id="mobilenumber" >
</div>
<div class="form-group">
<label><b>Email:</b></label>
<input type="text" class="form-control" placeholder="Email" name="email" required="true" id="email">
</div>

<div class="form-group">
<label><b>Password:</b></label>
<input type="password" class="form-control" placeholder="Password" name="password_1" id="password_1" required="true">
</div>

<div class="form-group">
<label><b>Confirm Password:</b></label>
<input type="password" class="form-control" placeholder="Confirm Password" name="password_2" id="password_2" required="true">
</div>

<button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="signup" id="signup" >Create a Account</button>

Have you already an account? <a style="color:#2196F3;" href="index.php">&nbsp Sign in</a>
</form>

</div>
</div>
</div>
</div>


<script src="vendors/jquery/dist/jquery.min.js"></script>
<script src="vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>


</body>

</html>
