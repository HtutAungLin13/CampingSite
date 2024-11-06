<?php 
	include('connection.php');

	$campsiteid=$_REQUEST['Cmpid'];
	$select="SELECT * from campsites where CampsiteID='$campsiteid'";
	$statement=mysqli_query($connect,$select);
	$row=mysqli_fetch_array($statement);

	$campsiteID=$row['CampsiteID'];
	$campname=$row['CampsiteName'];
	$location=$row['Location'];	
	

	if (isset($_POST['btnupdate'])) {
		$updcampID=$_POST['txtcampsiteID'];
		$updcampname=$_POST['txtcampsitename'];
		$updcamploc=$_POST['txtcamplocation'];

		$update="UPDATE campsites set CampsiteName='$updcampname', Location='$updcamploc' 
		where CampsiteID='$updcampID'";

		$upstatement=mysqli_query($connect,$update);
		if ($upstatement) {
		echo "Successfully Updated";
		echo "<script>window.location='campsite.php'</script>";
	}
	else
	{
		echo"error in Update";
	}
	}	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>campsiteupdate</title>
</head>
<body>
	<form action="campsiteupdate.php" method="POST">
		<input type="hidden" name="txtcampsiteID" value="<?php echo $campsiteID; ?>"><br>
		<input type="text" name="txtcampsitename" value="<?php echo $campname; ?>"><br>
		<input type="text" name="txtcamplocation" value="<?php echo $location; ?>"><br>
		<input type="submit" name="btnupdate" value="Update">
	</form>

</body>
</html>