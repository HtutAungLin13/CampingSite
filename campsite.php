<?php
    session_start();
    include('connection.php');

if (!isset($_SESSION['aid'])) 
    {
 		echo "<script>window.alert('Please login again')</script>";
	echo "<script>window.location='adminsignin.php'</script>";
 	} 


if (isset($_POST['btnsubmit'])) 
{
	$campname=$_POST['txtcampsitename'];
	$loc=$_POST['txtlocation'];
	$check = "SELECT * FROM campsites WHERE CampsiteName='$campname'";
	$query = mysqli_query($connect, $check);
	$count = mysqli_num_rows($query);
		if ($count>0) 
		{
			echo "<script>window.alert('Site already exist! Please Add Again')</script>";
			echo "<script>window.location='campsite.php'</script>";
		}
		else
		{
			$insert="INSERT INTO campsites(CampsiteName,Location) Values('$campname','$loc')";
			$finalresult=mysqli_query($connect,$insert);
			if ($finalresult) 
			{
				echo "<script>window.alert('Site Adding successfully')</script>";
				echo "<script>window.location='campsite.php'</script>";
			}
		}
}

	$select = "SELECT * FROM campsites";
    $query = mysqli_query($connect, $select);
    $count = mysqli_num_rows($query);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="GWSC.css"> 
    <title>Campsite Table Controlpanel</title>
</head>
<body>

     <form class="campsiteform" action="campsite.php" method="POST">

     	<h1>CAMPSITES</h1>

        <label for="txtsitename">Camp Name</label>
        <input type="text" id="txtcampsitename" name="txtcampsitename" placeholder="Enter site name" required/>

        <label for="txtlocation">Camp Location</label>
        <input type="text" id="txtlocation" name="txtlocation" placeholder="Enter location" required>

        <div class="btncampsite">
            <input type="submit" name="btnsubmit" value="Save">
            <input type="reset" value="Clear">
        </div>
    </form>

    <div class="tblcampsite">
        <h3>Campsite Table</h3>
        <table>
            <head>
                <tr>
                    <th>ID</th>
                    <th>Campsite Name</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
            </head>
            <body>

            <?php
            	while ($row = mysqli_fetch_array($query)) 
            {
                $campid = $row['CampsiteID'];
                $campname = $row['CampsiteName'];
                $location = $row['Location'];
                echo "<tr>";
                echo "<td>$campid</td>";
                echo "<td>$campname</td>";
                echo "<td>$location</td>";
                echo "<td>
                    <a href='CampsiteUpdate.php?Cmpid=$campid'>Edit</a>
                    <a href='CampsiteDelete.php?Cmpid=$campid'>Delete</a>
                </td>";
                echo "</tr>";
            }
            ?>
            </body>
        </table>
        <p class="noctrec">
            <?php
            if ($count == 0) {
                echo "No records";
            }
            ?>
        </p>
    </div>
</body>
</html>
