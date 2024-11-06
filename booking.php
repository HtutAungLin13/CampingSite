<?php
session_start();
include('connection.php');

if (!isset($_SESSION['ciD'])) 
    {
     	echo "<script>window.alert('Please Login in')</script>";
     	echo "<script>window.location='customersignin.php';</script>";
     } 
     if (isset($_REQUEST['PID'])) 
     {
     	$pitchid=$_REQUEST['PID'];
     	$Pitch="SELECT * FROM pitches
     	where PitchID='$pitchid'";
     	$query=mysqli_query($connect,$Pitch);
     	$data=mysqli_fetch_array($query);
     }
     if (isset($_POST['btnbooks'])) 
     {
     	$bdate = $_POST['txtbookingdate'];
        $bprice = $_POST['txtbprice'];
        $qty = $_POST['txtbookqty'];
        $btotal = ($bprice * $qty);
        $tax = $btotal * 0.05;
        $des=$_POST['txtdesc'];
        $status="Active";
        $phid = $_POST['txtpid'];
        $cusid = $_POST['txtcusid'];
        
       $insert = "INSERT INTO bookings(BookingDate, Price, BookingQuantity, Total, Tax, Description, Status, CustomerEmail, PitchID, CustomerID)
VALUES ('$bdate', '$bprice', '$qty', '$btotal', '$tax', '$des', '$status', '$cusemail', '$phid', '$cusid')";

        if (mysqli_query($connect, $insert)) {
            echo "<script>alert('Booking Successful');</script>";
            echo "<script>window.location='information.php';</script>";
        } else {
            echo "<script>alert('Booking Failed: " . mysqli_error($connect) . "');</script>";
        }
     }
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Bookings</title>
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
 	<div class="bookcontainer">
        <h1>RESERVATION FORM</h1>
        <form action="booking.php" method="POST" class="booking">
            <hr class="boldhr">
            <hr class="customerinfo">

            <h2 class="bookingtitle"></h2>
            <input type="hidden" name="txtcusid" value="<?php echo $_SESSION['ciD']; ?>">

            <label for="txtCustomerName" class="bookingtitle">Customer Firstname</label>
            <input type="text" id="txtCustomerName" name="txtCustomerName" value="<?php echo $_SESSION['cfN']; ?>" readonly class="bookingdata">

            <label for="txtSurName" class="bookingtitle">Customer Surname</label>
            <input type="text" id="txtSurName" name="txtSurName" value="<?php echo $_SESSION['csN']; ?>" readonly class="bookingdata">

            <label for="txtpitchID" class="bookingtitle">PitchID</label>
            <input type="text" id="txtpitchID" name="txtpid" value="<?php echo $data['PitchID'] ?>" readonly class="bookingdata">

            <label for="txtbookingdate" class="bookingtitle">Booking Date</label>
            <input type="date" id="txtbookingdate" name="txtbookingdate" value="<?php echo date('Y-m-d') ?>" required class="bookingdata">

            <label for="numQuantity" class="bookingtitle">Booking Quantity</label>
            <input type="number" id="numQuantity" name="txtbookqty" min="1" max="5" required class="bookingdata">

            <label for="txtprice" class="bookingtitle">Pitch Price</label>
            <input type="number" id="txtprice" name="txtbprice" value="<?php echo $data['Price'] ?>" readonly class="bookingdata">

            <label for="txtdesc" class="bookingtitle">Description</label>
            <input type="text" id="txtdesc" name="txtdesc" class="bookingdata">

            <input type="submit" name="btnbooks" value="Book" class="bookingsave">
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
            <p>Current Page:<a href="booking.php">Booking</a></p>
           
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