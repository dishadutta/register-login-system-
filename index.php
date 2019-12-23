<?php session_start();
require_once('dbconnection.php');

//Code for Registration 
if(isset($_POST['signup']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$contact=$_POST['contact'];
	$enc_password=$password;
	$msg=mysqli_query($con,"insert into users(fname,lname,email,password,contactno) values('$fname','$lname','$email','$enc_password','$contact')");
if($msg)
{
	echo "<script>alert('Registration successfully');</script>";
}
}

// Code for Login 
if(isset($_POST['login']))
{
$password=$_POST['password'];
$dec_password=$password;
$useremail=$_POST['uemail'];
$ret= mysqli_query($con,"SELECT * FROM users WHERE email='$useremail' and password='$dec_password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="welcome.html";
$_SESSION['login']=$_POST['uemail'];
$_SESSION['name']=$num['fname'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
echo "<script>alert('Invalid username or password');</script>";
exit();
}
}

?>

<html>

<head>
	<title>User Management</title>
	<link rel='stylesheet' href="style.css" type='text/css' />
</head>

<body>

<div class="main">
	<h1>Registration and Login System</h1>
	<p>Are you new to our site?<br>First, you need to <strong>Register</strong> to our site.</p>
	<div class="demo">
		<hr>
		<h2>Register</h2>
		<hr>
		<div class="register">
			<form name="registration" method="post" action="" enctype="multipart/form-data">
				<p>First Name </p>
				<input type="text" class="text" value=""  name="fname" required >
				<p>Last Name </p>
				<input type="text" class="text" value="" name="lname"  required >
				<p>Email Address </p>
				<input type="text" class="text" value="" name="email"  >
				<p>Password </p>
				<input type="password" value="" name="password" required>
				<p>Contact No. </p>
				<input type="text" value="" name="contact"  required>
				<div class="sign-up">
					<input type="reset" value="Reset">
				    <input type="submit" name="signup"  value="Sign Up" >
				</div>
			</form>
		</div>
	</div>
	<p><strong>Login</strong> to our site for further information</p>
	<div class="basic">
		<hr>
		<h2>Login</h2>
		<hr>
		<div class="facts">
		    <form name="login" action="" method="post">
				<br><input type="text" class="text" name="uemail" value="" placeholder="Enter your registered email"  ><a href="#" class=" icon email"></a>
				<br><br><br><input type="password" value="" name="password" placeholder="Enter valid password"><a href="#" class=" icon lock"></a>
				<div class="submit1">
					<input type="submit" name="login" value="LOG IN" >
				</div>
            </form>
        </div>
	</div>
</div>
</body>
</html>
