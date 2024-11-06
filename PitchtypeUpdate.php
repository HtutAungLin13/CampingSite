<?php 
	include('connection.php');
	$Pitchtypeid=$_REQUEST['Ptid'];

	$select="SELECT * from pitchtypes where PitchtypeID='$Pitchtypeid'";

	$statement=mysqli_query($connect,$select);
	$row=mysqli_fetch_array($statement);

	$ptid = $row['PitchtypeID'];
	$ptype = $row['Pitchtype'];
	$ptdes = $row['Description'];

	if (isset($_POST['btnupdate'])) 
	{
		$upptid=$_POST['txtptypeid'];
		$upptn=$_POST['txtptname'];
		$upptdes=$_POST['txtptdes'];

		$update="UPDATE Pitchtypes set Pitchtype='$upptn',Description='$upptdes'
		where PitchtypeID='$upptid'";

		$upstatement=mysqli_query($connect,$update);
		if ($upstatement) 
		{
			echo "Update Successful";
			echo "<script>window.location='pitchtype.php'</script>";
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
	<title>Pitchtypeupdate</title>
</head>
<body>
	<form action="pitchtypeupdate.php" method="POST">

		<input type="hidden" name="txtptypeid" value="<?php echo $ptid; ?>"><br>
		<input type="text" name="txtptname" value="<?php echo $ptype; ?>"><br>
		<input type="text" name="txtptdes" value="<?php echo $ptdes; ?>"><br>

		<input type="submit" name="btnupdate" value="Update">
	</form>

</body>
</html>