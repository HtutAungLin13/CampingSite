<?php
    session_start();
    include('connection.php');

if (!isset($_SESSION['aid'])) 
    {
        echo "<script>window.alert('Please login again')</script>";
    echo "<script>window.location='adminsignin.php'</script>";
    } 

if (isset($_POST['btnsubmit'])) {
	$phtype=$_POST['txtpitchtype'];
    $phdes=$_POST['txtDescription'];

	$check = "SELECT * FROM pitchtypes WHERE Pitchtype='$phtype'";
	$query = mysqli_query($connect, $check);
	$count = mysqli_num_rows($query);
		if ($count>0) 
		{
			echo "<script>window.alert('Pitchtype already exist!')</script>";
			echo "<script>window.location='pitchtype.php'</script>";
		}
		else
		{
			$insert="INSERT INTO pitchtypes(Pitchtype,Description) Values('$phtype','$phdes')";
			$finalresult=mysqli_query($connect,$insert);
			if ($finalresult) 
			{
				echo "<script>window.alert('Pitchtype Adding successfully')</script>";
				echo "<script>window.location='pitchtype.php'</script>";
			}
		}
} 
    $select = "SELECT * FROM pitchtypes";
    $query = mysqli_query($connect, $select);
    $count = mysqli_num_rows($query);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="GWSC.css">
    <title>Pitchtype</title>
</head>
<body>


    <section class="ptcontainer">
    <h2>Pitch Type</h2>
    <hr class="boldhr">
    <form class="pitchtype" action="pitchtype.php" method="POST">
        <label for="pitchType">Pitch Type</label>
        <input type="text" id="pitchType" name="txtpitchtype" placeholder="Enter pitch type" required/>

        <label for="Description">Description</label>
        <input type="text" id="Description" name="txtDescription" placeholder="Enter Description" required/>

        <div class="btnpitchtype">
            <input type="submit" name="btnsubmit" value="Save">
            <input type="reset" value="Clear">
        </div>
    </form>
    <hr class="boldhr">
    <div class="tblpitchtype">
        <h3>Pitch Type Lists</h3>
        <table>
            <head>
                <tr>
                    <th>ID</th>
                    <th>Pitch Type</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </head>
            <body>
                <?php
                while ($row = mysqli_fetch_array($query)) {
                    $ptid = $row['PitchtypeID'];
                    $ptype = $row['Pitchtype'];
                    $ptdes = $row['Description'];
                    echo "<tr>";
                    echo "<td>$ptid</td>";
                    echo "<td>$ptype</td>";
                    echo "<td>$ptdes</td>";
                    echo "<td>
                        <a href='PitchtypeUpdate.php?Ptid=$ptid'>Edit</a>
                        <a href='PitchtypeDelete.php?Ptid=$ptid'>Delete</a>
                    </td>";
                    echo "</tr>";
                }
                ?>
            </body>
        </table>
        <p class="pitch-type-no-records">
            <?php
            if ($count == 0) {
                echo "No records";
            }
            ?>
        </p>
    </div>
</section>
</body>
</html>
