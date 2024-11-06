<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
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
    <section class="viewcount">
        <?php
        session_start();
        include('connection.php');
        if (!isset($_SESSION['ciD'])) {
            echo "<script>window.alert('Please log in')</script>";
            echo "<script>window.location='customersignin.php'</script>";
        } else {
            $customer = $_SESSION['ciD'];
            $select = "SELECT * FROM customers WHERE CustomerID='$customer'";
            $query = mysqli_query($connect, $select);
            $count = mysqli_num_rows($query);

            if ($count > 0) {
                $data = mysqli_fetch_array($query);
                $viewCount = $data['ViewCount'];
                echo "View Count: " . $viewCount;
            }
        }
        ?>
    </section>
 
    <section class="welcome">

        
   </section>

     <section class="campsite">
   

    <div class="Slideshow-container">
        <div class="mySlides fade">
            
            <img src="gwscimg/1.jpg" alt="Avatar" style="padding-left: 50px; padding-right: 50px; width: 100%; padding-top:20px ;">
            <div class="numbertext">1/3</div>
        </div>

        <div class="mySlides fade">
            <img src="gwscimg/2.jpg" alt="Avatar" style="padding-left: 50px; padding-right: 50px; width: 100%; padding-top:20px ;">
            <div class="numbertext">2/3</div>
        </div>

        <div class="mySlides fade">
            <img src="gwscimg/3.jpg" alt="Avatar" style="padding-left: 50px; padding-right: 50px; width: 100%; padding-top:20px ;">
            <div class="numbertext">3/3</div>
        </div>
    </div>
<br>
    <div style="text-align: center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>       
    </div>

        <h2>Warmly Welcome From GLOBAL WILD SWIMMING AND CAMPING SITE</h2>
        <p>Welcome to a world of untamed adventure! <br>Dive into the pristine waters and set up camp amidst nature's beauty at our wild swimming and camping destination. <br>Immerse yourself in the untamed wilderness, where serenity meets exhilaration. <br> Get ready for an unforgettable escape into the great outdoors.</p>

      <hr class="boldhr">

     <h2>Campsites That Are Offered</h2>
    <p>View our selection of camping locations, perfect for all kinds of explorers.<br> We provide the ideal location for your outdoor retreat, whether you prefer tents, caravans, or RVs.</p>

    <div class="row">
        <div class="col-2">
            <h1 style=" font-family: Goudy Old Style;">TENT PITCH</h1>
            <p>Tent pitch refers to the act of setting up a tent in a designated camping or outdoor area, <br>typically involving securing the tent to the ground with stakes and ensuring it is stable and ready for use. 



 
        </div>
        <div class="col-2">
            <img src="gwscimg/tent.jpg" alt="Avatar" style="padding-left: 10px; padding-right: 5px;width: 100%; " >
        </div>
    </div>

      <div class="row">
        <div class="col-2">
            <h1 style=" font-family: Goudy Old Style;">CARAVAN PITCH</h1>
            <p> A caravan pitch is a designated space at a campsite where you can park and set up your caravan <br>or camper for a temporary stay, <br>typically equipped with utility hookups and amenities for travelers. <br>It provides a convenient and comfortable base for exploring the surrounding area.</p>
        </div>
        <div class="col-2">
            <img src="gwscimg/motorhome.jpg" alt="Avatar" style="width: 100%; " >
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <h1 style=" font-family: Goudy Old Style;">MOTORHOME PITCH.</h1>
            <p>
                A motorhome pitch is a designated area at a campground or RV park where motorhomes can park and set up for camping, <br>typically equipped with necessary hookups such as <br>electricity, water, and sewage connections. <br>It provides a convenient and comfortable base for motorhome travelers to enjoy their stay.
            </p>
        </div>
        <div class="col-2">
            <img src="gwscimg/caravan.jpg" alt="Avatar" style="width: 100%; " >
        </div>
    </div>
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
            <p>Current Page:<a href="home.php">Home</a></p>
           
        </div>
    </footer>
<script>
let slideIndex = 0;
showSlides();

function showSlides() 
{
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); 
}
</script>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
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

    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        }
    </script>

</body>
</html>
