<?php
include('connection.php'); 
if (isset($_POST['btnsubmit'])) 
    {
		$comsg=$_POST['txtcontactmsg'];
		$comail=$_POST['txtcontactemail'];
        $copn=$_POST['txtphonenumber'];

		$insert = $connect->prepare("INSERT INTO contacts (ContactMessage, Email, PhoneNumber) VALUES (?, ?, ?)");
    $insert->bind_param("sss", $conmessage, $conemail, $conpno);


    if ($insert->execute()) {
        echo "<script>window.alert('Contact Successful')</script>";
        echo "<script>window.location='contact.php'</script>";
    } else {
        echo "Error: " . $insert->error;
    }

 
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us Form</title>
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
        <div class="containercontact">
        <form action="contact.php" method="post">
            <h1 class="contactname">CONTACT US</h1>
            <hr class="boldhr">
              <h2>Welcom from GWSC Team</h1> </h2>
        <p >We're here to assist you feel free to reach out with any questions or concerns.<br>Your feedback is important to us, and our team is ready to help. <br>Please don't hesitate to get in touch for any inquiries, support, or suggestions</p>
        <div class="address">
           <h2>
               Our Company Address
           </h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3064.8253342399294!2d-89.61349192431283!3d39.81090959228942!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88753a0ca9d26b1b%3A0x9f09381ca07bc64d!2sE%20Elm%20St%2C%20Springfield%2C%20IL%2062702%2C%20USA!5e0!3m2!1sen!2smm!4v1697560343501!5m2!1sen!2smm" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <hr class="boldhr">
            <div class="contactgroup">
                <label for="txtcontact" class="contactlabel">Contact Message</label>
                <textarea id="txtcontact" name="txtcontactmsg" class="contactdata" placeholder="Enter Contact" rows="4" required></textarea>
            </div>
            <div class="contactgroup">
                <label for="txtemail" class="contactlabel">Email</label>
                <input type="text" name="txtcontactemail" id="txtemail" class="contactdata" placeholder="Enter Email">
            </div>
             <div class="contactgroup">
                <label for="txtemail" class="contactlabel">Phone Number</label>
                <input type="text" name="txtphonenumber" id="txtemail" class="contactdata" placeholder="Enter Email">
            </div>
            <div class="contactgroup">
            <p>I have read and agree to the <a href="privacypolicy.php">Privacy Policy</a>.</p>
        	</div>
            <div class="button">
                <input type="submit" name="btnsubmit" class="stylesubmit" value="Submit">
                <input type="reset" class="styleclear" value="Clear">
            </div>
        </form>
    	</div>
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
            <p>Current Page:<a href="contact.php">Contact Us</a></p>
           
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