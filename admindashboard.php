<?php 
    session_start();

        if (!isset($_SESSION['aid'])) 
{
        echo "<script> 
                window.alert('Please Sign In First!') 
                </script>";

            echo "<script> 
                window.location='adminsignin.php'
                </script>";
}

    include('connection.php');
    $adminname=$_SESSION['aname'];
    $adminemail=$_SESSION['aemail'];

 ?>
 
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
    <link rel="stylesheet" type="text/css" href="GWSC.css">
 </head>
 <body>
    <div class="dashboardcontainer">
        <aside class="adminbar">
            <div class="admindata">
            <h2>Welcome From Admin Dashboard Page, <span><?php echo $adminname; ?></span></h2>
            </div>
            <hr class="boldhr">
            <div >
                <ul class="adminbarmenu">
                <li><a href="campsite.php"> Campsite</a></li>
                <li><a href="pitchtype.php"> PitchType</a></li>
                <li><a href="pitch.php"> Pitch</a></li>
                <li><a href="contacttable.php"> Contacts Table</a></li>
                <li><a href="bookingtable.php"> Bookings Table</a></li>
                </ul>
                </div>
            </aside>

       
    </div>
 </body>
 </html>