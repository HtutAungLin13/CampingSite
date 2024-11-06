<?php 
session_start();
include('connection.php');

        if (isset($_GET['PID'])) 
    {
    	$PID=$_GET['PID'];
    	$query="SELECT p.*, pt.PitchtypeID, pt.Pitchtype, pc.CampsiteID, pc.CampsiteName, pc.Location
    	FROM pitches p, pitchtypes pt, campsites pc
    	WHERE p.PitchtypeID=pt.PitchtypeID and
    	p.CampsiteID =	pc.CampsiteID and
    	p.PitchID='$PID'";

    	$query2=mysqli_query($connect,$query);

    	$data=mysqli_fetch_array($query2);

    	$phname=$data['PitchName'];
    	$pimg=$data['PitchImage'];
    	$facn1=$data['FacilityName1'];
    	$facn2=$data['FacilityName2'];
    	$facn3=$data['FacilityName3'];
    	$fcimg1=$data['FacilityImage1'];
    	$fcimg2=$data['FacilityImage2'];
    	$fcimg3=$data['FacilityImage3'];
    	$la1=$data['LocalattractionName1'];
    	$la2=$data['LocalattractionName2'];
    	$la3=$data['LocalattractionName3'];
    	$laimg1=$data['LocalattractionImage1'];
    	$laimg2=$data['LocalattractionImage2'];
    	$laimg3=$data['LocalattractionImage3'];
    	$pthprice=$data['Price'];
    	$pdesc=$data['Description'];
    	$pht=$data['Pitchtype'];
    	$campn=$data['CampsiteName'];

    }
    else
    {
    	echo "<p>Pitch Detail not found!</p>";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Details</title>
    <link rel="stylesheet" type="text/css" href="GWSC.css">
</head>
<body>
    <header>
        <nav class="nav">
            <div class="logo">
                <img src="gwscimg/logo.png" alt="">
            </div>
            <div class="nav-toggle" onclick="toggleNav()">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
            <ul class="nav-list">
                <li><a href="home.php">Home |</a></li>
                <li><a href="information.php">Information |</a></li>
                <li><a href="availability.php">Availability |</a></li>
                <li><a href="localattraction.php">Local Attractions |</a></li>
                <li><a href="facility.php">Facilities |</a></li>
                <li><a href="contact.php">Contact Us |</a></li>
                <li><a href="reviews.php">Reviews |</a></li>
  
                <li><a href="customersignin.php">Sign In |</a></li>
            
        </nav>
    </header>
    <form action="details.php" method="GET" class="detail-form">
    <fieldset>
        <legend>Package Details for <?php echo $phname; ?></legend>
        <div class="pitchdetail">
            <div class="group">
                <h1>Pitch Details Information</h1>
                <img src="<?php echo $pimg ?>" alt="Pitch Image"/>
            </div>
            <div class="group">
                <h1>Facility Details</h1>
                <img src="<?php echo $fcimg1 ?>" alt="Facility Image 1"/>
                <img src="<?php echo $fcimg2 ?>" alt="Facility Image 2"/>
                <img src="<?php echo $fcimg3 ?>" alt="Facility Image 3"/>
            </div>
            <div class="group">
                <h1>Local Attraction Details</h1>
                <img src="<?php echo $laimg1 ?>" alt="Attraction Image 1"/>
                <img src="<?php echo $laimg2 ?>" alt="Attraction Image 2"/>
                
            </div>
        </div>
       
        <div class="pitchtable">
            <table>
                <tr>
                    <td>PackageName</td>
                    <td><?php echo $phname ?></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><?php echo $pthprice ?></td>
                </tr>
                <tr>
                    <td>Pitchtype</td>
                    <td><?php echo $pht ?></td>
                </tr>
                <tr>
                    <td>Campsite</td>
                    <td><?php echo $campn ?></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><?php echo $pdesc ?></td>
                </tr>
            </table>
            <a href="booking.php?PID=<?php echo $PID ?>">Book Now</a>
        </div>
    </fieldset>
</form>

    <footer>
    <div id="Gtranslate"></div>
    
     <div class="contactus">
            <h1 style=" font-family: Goudy Old Style;">CONTACT US</h1>
            <p><i class="fa-regular fa-envelope" style="color: #000000;"></i> EMAIL  :  GWSChal1@gmail.com
                <br>
               <i class="fa-regular fa-address-book" style="color: #000000;"></i> PHONE NUMBER  :  09-276936486<br>
            <i class="fa-regular fa-map" style="color: #000000;"></i> LOCATION  :  Elm Street, Springfield, IL 62701, United States </p>
        </div><br>
        <div id="google_translate_element"></div>
    <hr class="boldhr">
    <br>
       <div class="media">
                <a href="#"><i class="fa-brands fa-facebook" style="color: #000000;"></i></a>
                <a href="#"><i class="fa-brands fa-instagram" style="color: #000000;"></i></a>
                <a href="#"><i class="fa-brands fa-viber" style="color: #000000;"></i></a>
                <a href="rssfeed.php"><i class="fa-solid fa-rss" style="color: #000000;"></i></a>
            </div>
       <div class="footer">
             <p>  Unleashing Nature's Beauty. <br>All Rights Safeguarded.<br>&copy;  2023 Global Wild Swimming and Camping</p>
            <p>Current Page:<a href="details.php">Detail</a></p>
           
        </div>
    </footer>
    <script>
        function toggleNav() {
        const navList = document.querySelector('.nav-list');
        const navToggle = document.querySelector('.nav-toggle');
        navList.classList.toggle('active');
        navToggle.classList.toggle('active'); 
         bars.forEach(bar => {
        bar.classList.toggle('active');
        });
        }
</script>
</body>
</html>

                            