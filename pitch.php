<?php
	session_start();
	include('connection.php');

	if (!isset($_SESSION['aid'])) 
    {
        echo "<script>window.alert('Please login again')</script>";
    echo "<script>window.location='adminsignin.php'</script>";
    } 

	if (isset($_POST['btnadd'])) 
	{
		$phname=$_POST['txtpitchname'];

		$pimg=$_FILES['txtphimage']['name'];
		$folder="gwscimg/";
		$pitchimg=$folder."_".$pimg;
		$copy=copy($_FILES['txtphimage']['tmp_name'], $pitchimg);
		if (!$copy) 
		{
		echo "<p>Cannot Upload Image</p>";
		exit();
		}

		$location=$_POST['txtploc'];
		$fname1=$_POST['txtfn1'];
		$fname2=$_POST['txtfn2'];
		$fname3=$_POST['txtfn3'];
		
		$faimg1=$_FILES['txtfimg1']['name'];
		$folder="gwscimg/";
		$fimg1=$folder."_".$faimg1;
		$copy=copy($_FILES['txtfimg1']['tmp_name'], $fimg1);
		if (!$copy) 
		{
		echo "<p>Cannot Upload Image</p>";
		exit();
		}

		$faimg2=$_FILES['txtfimg2']['name'];
		$folder="gwscimg/";
		$fimg2=$folder."_".$faimg2;
		$copy=copy($_FILES['txtfimg2']['tmp_name'], $fimg2);
		if (!$copy) 
		{
		echo "<p>Cannot Upload Image</p>";
		exit();
		}

		$faimg3=$_FILES['txtfimg3']['name'];
		$folder="gwscimg/";
		$fimg3=$folder."_".$faimg3;
		$copy=copy($_FILES['txtfimg3']['tmp_name'], $fimg3);
		if (!$copy) 
		{
		echo "<p>Cannot Upload Image</p>";
		exit();
		}

		$Lname1=$_POST['txtlocatt1'];
		$Lname2=$_POST['txtlocatt2'];
		$Lname3=$_POST['txtlocatt3'];

		$limg1=$_FILES['txtlaimg1']['name'];
		$folder="gwscimg/";
		$loclimg1=$folder."_".$limg1;
		$copy=copy($_FILES['txtlaimg1']['tmp_name'], $loclimg1);
		if (!$copy) 
		{
		echo "<p>Cannot Upload Image</p>";
		exit();
		}

		$limg2=$_FILES['txtlaimg2']['name'];
		$folder="gwscimg/";
		$loclimg2=$folder."_".$limg2;
		$copy=copy($_FILES['txtlaimg2']['tmp_name'], $loclimg2);
		if (!$copy) 
		{
		echo "<p>Cannot Upload Image</p>";
		exit();
		}

		$limg3=$_FILES['txtlaimg3']['name'];
		$folder="gwscimg/";
		$loclimg2=$folder."_".$limg3;
		$copy=copy($_FILES['txtlaimg3']['tmp_name'], $loclimg2);
		if (!$copy) 
		{
		echo "<p>Cannot Upload Image</p>";
		exit();
		}

		$pprice=$_POST['txtpitchprice'];
		$des=$_POST['txtdescription'];
		$status="Active";
		$due=$_POST['txtduration'];
		$cbocsite=$_POST['cbocampsite'];
		$cboptype=$_POST['cbopitchtype'];

		$check = "SELECT * FROM pitches WHERE PitchName='$phname'";
		$query = mysqli_query($connect, $check);
		$count = mysqli_num_rows($query);
		if ($count>0) 
		{
			echo "<script>window.alert('Pitch already exist! Please Add Again')</script>";
			echo "<script>window.location='pitch.php'</script>";
		}
		else
		{
			$insert="INSERT INTO pitches(PitchName,PitchImage,Location,FacilityName1,FacilityName2,FacilityName3,FacilityImage1,FacilityImage2,FacilityImage3,LocalattractionName1,LocalattractionName2,LocalattractionName3,LocalattractionImage1,LocalattractionImage2,LocalattractionImage3,Price,Description,Status,Duration,CampsiteID,PitchtypeID) 
			Values('$phname','$pitchimg','$location','$fname1','$fname2','$fname3','$fimg1','$fimg2','$fimg3','$Lname1','$Lname2','$Lname3','$loclimg1','$loclimg2','$loclimg3','$pprice','$des','$status','$due','$cbocsite','$cboptype')";
			$finalresult=mysqli_query($connect,$insert);
			if ($finalresult) 
			{
				echo "<script>window.alert('Pitch Adding successfully')</script>";
				echo "<script>window.location='pitch.php'</script>";
			}
		}
}
	$select = "SELECT * FROM pitches";
    $query = mysqli_query($connect, $select);
    $count = mysqli_num_rows($query);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="GWSC.css"> 
	<title>Pitch</title>
</head>
<body>
	<form class="fmpitch" action="pitch.php" method="POST" enctype="multipart/form-data">
		<h1>Pitches</h1>
<hr class="boldhr">
		<label>Pitch</label>
			<input type="text" name="txtpitchname" placeholder="enter pitch" required>
		<label>PitchImage</label>
		<input type="file" name="txtphimage"required>
		<label>Location</label>
		<input type="text" name="txtploc" placeholder="enter location" required>
		<label>Facitily Name1</label>
		<input type="text" name="txtfn1" placeholder="enter Facitily" required>
		<label>Facitily Name2</label>
		<input type="text" name="txtfn2" placeholder="enter Facitily" required>
		<label>Facitily Name3</label>
		<input type="text" name="txtfn3" placeholder="enter Facitily" required>
		<label>Facility Image1</label>
		<input type="file" name="txtfimg1"required>
		<label>Facility Image2</label>
		<input type="file" name="txtfimg2"required>
		<label>Facility Image3</label>
		<input type="file" name="txtfimg3"required>
		<label>Local Attraction Name1</label>
		<input type="text" name="txtlocatt1" placeholder="enter attraction" required>
		<label>Local Attraction Name2</label>
		<input type="text" name="txtlocatt2" placeholder="enter attraction" required>
		<label>Local Attraction Name3</label>
		<input type="text" name="txtlocatt3" placeholder="enter attraction" required>
		<label>Local Attraction Image1</label>
		<input type="file" name="txtlaimg1"required>
		<label>Local Attraction Image2</label>
		<input type="file" name="txtlaimg2"required>
		<label>Local Attraction Image3</label>
		<input type="file" name="txtlaimg3"required>
		<label>Price</label>
		<input type="number" name="txtpitchprice" placeholder="enter price" required>
		<label>Description</label>
		<input type="text" name="txtdescription" placeholder="enter Description" required>
		<label>Duration</label>
		<input type="text" name="txtduration" placeholder="enter Duration" required>

		<label>Choose Campsite</label>
		<select name="cbocampsite">
	    <?php
	    // Retrieve campsite data from the database
	    $select = "SELECT * FROM campsites";
	    $run = mysqli_query($connect, $select);
	    $count = mysqli_num_rows($run);

	    // Loop through the retrieved data and create <option> elements
	    for ($i = 0; $i < $count; $i++) {
	        $data = mysqli_fetch_array($run);
	        $cid = $data['CampsiteID']; // Assuming CampsiteID is the column name in your database
	        $cname = $data['CampsiteName'];
	        echo "<option value='$cid'>$cname</option>";
	    }
	    ?>
		</select>

		<label>Choose PitchType</label>
		<select name="cbopitchtype">
	    <?php
	    // Retrieve campsite data from the database
	    $select = "SELECT * FROM pitchtypes";
	    $run = mysqli_query($connect, $select);
	    $count = mysqli_num_rows($run);

	    // Loop through the retrieved data and create <option> elements
	    for ($i = 0; $i < $count; $i++) {
	        $data = mysqli_fetch_array($run);
	        $pid = $data['PitchtypeID']; // Assuming CampsiteID is the column name in your database
	        $ptname = $data['Pitchtype'];
	        echo "<option value='$pid'>$ptname</option>";
	    }
	    ?>
		</select>
		<div class="btnfmpitch">
            <input type="submit" name="btnadd" value="Save">
            <input type="reset" value="Clear">
        </div>

	</form>
	<div class="tblpitchfm">
        <h3>Pitch Table</h3>
        <table>
            <head>
                <tr>
                    <th>ID</th>
                    <th>Pitch Name</th>
                    <th>Facility Name</th>
                    <th>Local Attraction</th>
                    <th>Price </th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </head>
            <body>
                <?php
                while ($pData = mysqli_fetch_array($query)) 
                {
                	$pId=$pData['PitchID'];
					$pname=$pData['PitchName'];
					$fn1=$pData['FacilityName1'];
					$localn1=$pData['LocalattractionName1'];
					$phprice=$pData['Price'];
					$sta=$pData['Status'];

                    echo "<tr>";
                    echo "<td>$pId</td>";
                    echo "<td>$pname</td>";
                    echo "<td>$fn1 </td>";
                    echo "<td>$localn1 </td>";
                    echo "<td>$phprice </td>";
                    echo "<td>$sta </td>";

                    echo "<td>
                        <a href='PitchDelete.php?pitchid=$pId'>Delete</a>
                    </td>";
                    echo "</tr>";
                }
                ?>
            </body>
        </table>
        <p class="norecpitchinfo">
            <?php
            if ($count == 0) {
                echo "No records";
            }
            ?>
        </p>
    </div>
</body>
</html>

</body>
</html>
