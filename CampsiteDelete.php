<?php 
include('connection.php');
$campsiteid=$_REQUEST['Cmpid'];
$delete="DELETE FROM campsites where CampsiteID='$campsiteid'";
$statement=mysqli_query($connect,$delete);

if ($statement) 
{
	echo "Campsite data have been successfully deleted";
	echo "<script>window.location='campsite.php'</script>";
}
else
{
	echo"error in deletion";
}
 ?>