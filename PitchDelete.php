<?php 
include('connection.php');

$phid=$_REQUEST['pitchid'];
$delete="DELETE FROM pitches where PitchID='$phid'";
$statement=mysqli_query($connect,$delete);

if ($statement) 
{
	echo "Successfully deleted";
	echo "<script>window.location='pitch.php'</script>";
}
else
{
	echo"error in deletion";
}
 ?>