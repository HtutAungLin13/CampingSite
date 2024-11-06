<?php 
	session_start();
	include('connection.php');
 ?>

 <!DOCTYPE html>
 <html lang="en"> 
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 	<link rel="stylesheet" type="text/css" href="GWSC.css">
 	<title>Availability</title>
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
    
 	<div class="avcontainer">
        
        <form action="availability.php" method="POST">

            <input type="text" name="txtpsearch" placeholder="Enter pitch name">
            <input type="submit" name="btnsubmit" value="SEARCH">
            <h1>Warmly Welcome to GWSC's Avaliability page</h1>
            <p >
            Discover our breathtaking campsite, nestled in the heart of nature.<br> Enjoy spacious, well-equipped sites perfect for your outdoor adventure. <br>Unplug, unwind, and create lasting memories at our serene campsite.</p> 
 <hr class="boldhr">
        </form> 	
     </div>
         <div class="pitchdisplay">
        <?php
            if (isset($_POST['btnsubmit'])) 
            {
            $pname = $_POST['txtpsearch'];
            $query = "SELECT * FROM pitches WHERE Status='Active' AND PitchName LIKE '%$pname%'";
            }
            else {
                $query = "SELECT * FROM pitches WHERE Status='Active'";
            }

        $result = mysqli_query($connect, $query);
        $count = mysqli_num_rows($result);

        if ($count > 0) {
            while ($data = mysqli_fetch_array($result)) {
                echo "<div class='pitchdis'>";
                echo "<a href='Details.php?PID=" . $data['PitchID'] . "'>";
                echo "<img src='" . $data['PitchImage'] . "' alt='" . $data['PitchName'] . "'>";
                echo "<br>";
                echo "<b>" . $data['PitchName'] . "</b>";
                echo "<br>";
                echo "<b>" . $data['Price'] . "$</b>";
                echo "</a>";
                echo "</div>";
            }
        } else {
             echo "<div class='no-pitches-found'>";
            echo "<p>Sorry, we couldn't find any available pitches matching your search.</p>";
            echo "</div>";
        }
        ?>
    </div>
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
            <p>Current Page:<a href="availability.php">Availability</a></p>
           
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