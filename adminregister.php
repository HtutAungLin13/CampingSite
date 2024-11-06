<?php

include('connection.php'); 
if (isset($_POST['btnregister'])) 
	{

		$aname=$_POST['txtAname'];
		$aphone=$_POST['txtAphone'];
		$aemail=$_POST['txtAemail'];
		$apassword=$_POST['txtApassword'];
		$aaddress=$_POST['txtAaddress'];
		$aposition=$_POST['txtAposition'];
		
		$checkemail="SELECT * FROM admins WHERE Email='$aemail'";
		$result=mysqli_query($connect,$checkemail);
		$count=mysqli_num_rows($result);

		if ($count>0) 
		{
			echo "<script>window.alert('Your Email already exist! Please Register Again')</script>";
			echo "<script>window.location='adminregister.php'</script>";
		}
		else
		{
			$insert="INSERT INTO admins(Adminname,PhoneNumber,Email,Password,Address,Position) Values('$aname','$aphone','$aemail','$apassword','$aaddress','$aposition')";
			$finalresult=mysqli_query($connect,$insert);

			if ($finalresult) 
			{
				echo "<script>window.alert('Admin Register successfully')</script>";
				echo "<script>window.location='adminregister.php'</script>";
			}
		}
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Admin Register</title>
 	<link rel="stylesheet" type="text/css" href="GWSC.css">
 </head>
 <body>
 		<div class="container">
            <form class="form-container" action="adminregister.php" method="post">
                <h1>Admin Register Form</h1>
                <div>
                    <label for="txtAname">Admin Name</label>
                    <input type="text" name="txtAname" id="txtAname" placeholder="Enter Admin Full Name">
                </div>
                <div>
                    <label for="txtAphoneno">Admin Phone Number</label>
                    <input type="text" name="txtAphoneno" id="txtAphoneno" placeholder="Enter Admin Phone Number">
                </div>
                <div>
                    <label for="txtAemail">Admin Email</label>
                    <input type="email" name="txtAemail" id="txtAemail" placeholder="Enter Admin Email">
                </div>
                <div>
                    <label for="txtApassword">Admin Password</label>
                    <input type="password" name="txtApassword" id="txtApassword" placeholder="Enter Admin Password">
                </div>

                 <div>
                    <label for="txtAaddress">Admin Address</label>
                    <input type="text" name="txtAaddress" id="txtAaddress" placeholder="Enter Admin Address">
                </div>

                 <div>
                    <label for="txtAposition">Admin Position</label>
                    <input type="text" name="txtAposition" id="txtAposition" placeholder="Enter Admin Position">
                </div>

                <div class="adminbtncon">
            		<input type="submit" name="btnregister" value="Register">
            		<input type="reset" value="Clear">
        				</div>
            </form>
            <p>Already have an account? <a href="adminsignin.php">Login here</a></p>
        </div>
 </body>
 </html>