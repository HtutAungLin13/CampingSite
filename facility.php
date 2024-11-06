<?php
    include('connection.php');

    $query = "SELECT  PitchName, FacilityName1, FacilityName2, FacilityName3, FacilityImage1, FacilityImage2, FacilityImage3 FROM Pitches";
    $result = mysqli_query($connect, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <title>Facilities</title>
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

    <section class="content">
        
     <div class="lchead">
        <h1>FACILITY</h1>
          <h2>Here are some Facilities </h2>
        <p >Welcome to our world-class facility, where your every need is met with excellence and care.</p>
        </div>


      <hr class="boldhr">

    <section >

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='locAttraction'>";
            echo "<h3>" . $row['FacilityName1'] . "</h3>";
            echo "<img src='" . $row['FacilityImage1'] . "' alt='" . $row['FacilityImage1'] . "'>";
            echo "<p>Pitch: " . $row['PitchName'] . "</p>";
            echo "</div>";        
        }
        ?>

    </section>

      <hr class="boldhr">
    <section class="weartechno">
    <h2>Wearable Technologies</h2>
    <ul>
        <li>
            <strong> <ion-icon size="large" name="watch"></ion-icon> Smart Watches</strong>
            <p>It can display notifications, track physical activity, and run apps.</p>
        </li>
        <li>
            <strong> <ion-icon size="large" name="headset-sharp"></ion-icon> Hearable Devices</strong>
            <p>It offer features like listening to music, making calls, and monitoring health metrics.</p>
        </li>
        <li>
            <strong><ion-icon size="large" name="camera-sharp"></ion-icon> Wearable Cameras</strong>
            <p>It is use to capture photos and videos from a first-person perspective.</p>
        </li>
        <li>
            <strong> <ion-icon size="large" name="location-sharp"></ion-icon> Location Trackers</strong>
            <p>It can help visitors keep tabs on their location and share it with others for safety or fitness tracking.</p>
        </li>
        <li>
            <strong><ion-icon size="large" name="heart-sharp"></ion-icon> Health Monitors</strong>
            <p>It can often used for medical monitoring and managing chronic conditions.</p>
        </li>
        <li>
            <strong><ion-icon size="large"name="glasses-sharp"></ion-icon> Smart Glasses</strong>
            <p>Incorporate a heads-up display (HUD) to provide information and augmented reality experiences.</p>
        </li>
    </ul>
    </section>
    </section>

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
            <p>Current Page:<a href="facility.php">Facility</a></p>
           
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
