<?php 	
	include('connection.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Information</title>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
		<fieldset>
			<legend>Avaliable Campsite Information</legend>
			<section class="catalog">
				<?php 
				$query="SELECT * from pitches p,
				pitchtypes pt
				where p.PitchtypeID=pt.PitchtypeID";

				$ret=mysqli_query($connect,$query);
				$count=mysqli_num_rows($ret);
				if($count==0)
				{
					echo "<p>There is Not Found GWSC Info</p>";
				 
				}
				else
				{
					for ($i=0; $i<$count ; $i+=3) 
					{ 
						$query1="SELECT * from pitches p, pitchtypes pt
						where p.PitchtypeID=pt.PitchtypeID
						Order by PitchID Limit $i,3";
						$ret1=mysqli_query($connect,$query1);
						$count1=mysqli_num_rows($ret1);

						echo "<div class='infotbl'>";
						for ($j=0; $j <$count1 ; $j++) { 
							$data=mysqli_fetch_array($ret1);

							$PID=$data['PitchID'];
							$Pname=$data['PitchName'];
							$Pimg=$data['PitchImage'];
							$Ploc=$data['Location'];
							$Flimg1=$data['FacilityImage1'];
							$Fln1=$data['FacilityName1'];
							$Latimg1=$data['LocalattractionImage1'];
							$Latn1=$data['LocalattractionName1'];
							$Pprice=$data['Price'];
					?>

					<div class="listinfo">
	                <img src="<?php echo $Pimg;?>" class="imginfo">
	                <div class="infodetail">
                    <h4>Local Attractions</h4>
                    <embed src="<?php echo $Latimg1; ?>" class="add">
                    <h4>Facilities</h4>
                    <embed src="<?php echo $Flimg1; ?>" class="add">
                    <div class="desc">
                        <b>Pitch Name: <?php echo $Pname; ?></b><br>
                        <b>Price: <?php echo $Pprice; ?></b><br>
                        <a href="Details.php?PID=<?php echo $PID ?>">See More >></a>
                    </div>
	                </div>
	                <div class="googlemap">
        				<iframe src="<?php echo $Ploc; ?>" frameborder="0" allowfullscreen=""></iframe>
    				</div>

            		</div>
					<?php  
						}
					echo "</div>";
					}
				}
			?>			
			</section>
		</fieldset>
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
            <p>Current Page:<a href="information.php">Information</a></p>
           
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