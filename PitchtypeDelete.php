<?php 
	include('connection.php');
	$Pitchtypeid=$_REQUEST['Ptid'];

	$delete="DELETE FROM pitchtypes WHERE PitchtypeID='$Pitchtypeid'";
	$statement=mysqli_query($connect,$delete);

	if ($statement) 
	{
		echo "Pitch Type data have been successfully deleted";
		echo "<script>
		window.location='pitchtype.php'
		</script>";
	}
	else
	{
		echo"error in delete";
	}
 ?>
