<?php
    session_start();
    include('connection.php');

    if (!isset($_SESSION['ciD'])) 
        {
     		echo "<script>window.alert('Please login again')</script>";
    	echo "<script>window.location='customersignin.php'</script>";
     	} 

    if (isset($_POST['btnsubmit'])) 
    {
    	$preview=$_POST['txtReview'];
    	$prate=$_POST['Rating'];
        $cusid = $_SESSION['ciD'];
        $cusemail= $_SESSION['Cemail'];

    	$check = "SELECT * FROM reviews WHERE ReviewID='$preview'";
    	$query = mysqli_query($connect, $check);
    	$count = mysqli_num_rows($query);
    		if ($count>0) 
    		{
    			echo "<script>window.alert('Review already exist! Please Add Again')</script>";
    			echo "<script>window.location='reviews.php'</script>";
    		}
    		else
    		{
    			$insert = "INSERT INTO reviews (Review, Rating, Status) VALUES ('$preview', $prate, '$pstatus')";
$finalresult = mysqli_query($connect, $insert);
    			if ($finalresult) 
    			{
    				echo "<script>window.alert('Review Adding successfully')</script>";
    				echo "<script>window.location='reviews.php'</script>";
    			}
    		}
    }

    	$select = "SELECT * FROM reviews";
        $query = mysqli_query($connect, $select);
        $count = mysqli_num_rows($query);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="GWSC.css">
    <title>Reviews</title>
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

     <form class="reviewlist" action="reviews.php" method="POST">
        
        <h1>Reviews</h1>
          <hr class="boldhr">
          <div class="lchead">
          <h2>Hello, welcome to GWSC review page! </h2>
        <p >I'm here to assist you with any questions or information you might need about wild swimming and camping. <br>Whether you're looking for recommendations on the best spots for wild swimming, advice on camping gear, feel free to send feedback</p>
        </div>
         <label for="txtRating">Rating</label>
        <div class="rate">
        <input type="radio" id="star5" name="Rating" value="5" required>
        <label for="star5"></label>
        <input type="radio" id="star4" name="Rating" value="4" required>
        <label for="star4"></label>
        <input type="radio" id="star3" name="Rating" value="3" required>
        <label for="star3"></label>
        <input type="radio" id="star2" name="Rating" value="2" required>
        <label for="star2"></label>
        <input type="radio" id="star1" name="Rating" value="1" required>
        <label for="star1"></label>
        </div>

        <label for="txtReview">Review</label>
        <textarea id="txtReview" name="txtReview" placeholder="Enter Review" rows="4" required></textarea>

            <textarea name="txtreview" placeholder=" Leave your Feedback" required/></textarea>

        <div class="btnreview">

            <input type="submit" name="btnsubmit" value="Submit">
            <input type="reset" value="Clear">
        </div>
    </form>

    <section class="listreview">
    <h2>Customer Reviews</h2>
    <hr class="boldhr">
    <div class="reviewtable">
        <?php
        while ($row = mysqli_fetch_assoc($query)) {
            $custemail = $_SESSION['Cemail']; 
            
        ?>
        <div class="datareview">
            <div class="cusinfo">
                <strong>User Email:</strong> <?php echo $custemail; ?><br>
                <strong>Rating:</strong> <?php echo $row['Rating']; ?>
            </div>
            <p><?php echo $row['Review']; ?></p>
        </div>
        <?php } ?>
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
            <p>Current Page:<a href="reviews.php">Review</a></p>
           
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