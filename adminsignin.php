<?php
	session_start();
	include('connection.php');

	if(isset($_POST['btnlogin']))
	{
		$aemail = $_POST['txtAemail'];
		$apassword = $_POST['txtApassword'];

		$check = "SELECT * FROM admins WHERE Email='$aemail' AND Password='$apassword'";
		$query = mysqli_query($connect, $check);
		$count = mysqli_num_rows($query);

		if($count > 0)
		{
			$array = mysqli_fetch_array($query);
			$adminid = $array['AdminID'];
			$adminname = $array['Adminname'];
			$adminemail = $array['Email'];

			$_SESSION['aid'] = $adminid;
			$_SESSION['aname'] = $adminname;
			$_SESSION['aemail'] = $adminemail;

			echo "<script>window.alert('Admin login successfully')</script>";
			echo "<script>window.location='admindashboard.php'</script>";
		} 
		else
		{
			echo "<script>window.alert('Admin login unsuccessful')</script>";
			echo "<script>window.location='adminsignin.php'</script>";
		}
	}
 ?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>AdminLogin</title>
		<link rel="stylesheet" type="text/css" href="GWSC.css">
	</head>
	<body>
        <div class="signincontainer">
            <form class="signin-form" action="adminsignin.php" method="POST">

                <h1>Admin Sign In</h1>
                 <hr class="boldhr">
                <label for="txtAemail">Admin Email</label>
                <input type="email" name="txtAemail" id="txtAemail" placeholder="Enter your email" required/>

                <label for="txtApassword">Admin Password</label>
                <input type="password" name="txtApassword" id="txtApassword" placeholder="Enter your password" required/>
                <label>
                	<input type="checkbox" >Remember me
                </label>

                <input type="submit" name="btnlogin" value="Sign In">
            </form>

            <p>Need account >>> <a href="adminregister.php">Register</a></p>
        </div>
	</body>
	</html>