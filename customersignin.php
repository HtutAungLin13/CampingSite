<?php
    session_start();
    include('connection.php');


    if (!isset($_SESSION['logincount'])) 
    {
        $_SESSION['logincount'] = 0;
    }


define('maxlogincount', 3); 
define('logouttime', 600); 

if (isset($_POST['btnlogin'])) {
    $cusemail = $_POST['txtcemail'];
    $cuspassword = $_POST['txtcpassword'];

   
    if ($_SESSION['logincount'] >= maxlogincount && time() - $_SESSION['failedlogincount'] < logouttime) {
        $leftt = logouttime - (time() - $_SESSION['failedlogincount']);
        echo "<script>window.alert('Account locked. Please try again after $leftt seconds.')</script>";
        echo "<script>window.location='customersignin.php'</script>";
    } else {
        $logincountnum = $_SESSION['logincount'] + 1; 

        $check = "SELECT * FROM customers WHERE Email='$cusemail' AND Password='$cuspassword'";
        $query = mysqli_query($connect, $check);
        $count = mysqli_num_rows($query);

        if ($count > 0) 
        {
            $_SESSION['logincount'] = 0;
            $_SESSION['failedlogincount'] = 0;

            $update = "UPDATE customers SET viewcount=viewcount+1 WHERE Email='$cusemail' AND Password='$cuspassword'";
            mysqli_query($connect, $update);

            $array = mysqli_fetch_array($query);
            $cid = $array['CustomerID'];
            $cfn = $array['Firstname'];
            $csn = $array['Surname'];
            $cemail = $array['Email'];
            $cadds = $array['Address'];

            $_SESSION['ciD'] = $cid;
            $_SESSION['cfN'] = $cfn;
            $_SESSION['csN'] = $csn;
            $_SESSION['Cemail'] = $cemail;
            $_SESSION['Cadds'] = $cadds;

            echo "<script>window.alert('Customer login successfully')</script>";
            echo "<script>window.location='home.php'</script>";
        } 
        else 
        {
            $_SESSION['logincount']++;
            $_SESSION['failedlogincount'] = time();

          
            if ($_SESSION['logincount'] >= maxlogincount) {
                echo "<script>window.alert('Account locked. Please try again after 10 minutes.')</script>";
                echo "<script>window.location='customersignin.php'</script>";
            } else {
                echo "<script>window.alert('Customer login unsuccessful - Attempt $logincountnum')</script>";
                echo "<script>window.location='customersignin.php'</script>";

            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Login</title>
     <link rel="stylesheet" type="text/css" href="GWSC.css">
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
     <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
</head>

<body>
    <div class="signincontainer">
    <form class="signin-form" action="customersignin.php" method="POST">
        <h1>Customer Sign In</h1>
         <hr class="boldhr">
        <label for="email"><ion-icon name="mail" size="large" ></ion-icon> Email:</label>
        <input type="email" id="email" name="txtcemail" placeholder="Enter your email" required><br>
        
        <label for="password"><ion-icon name="lock-closed" size="large" ></ion-icon> Password:</label>
        <input type="password" id="password" name="txtcpassword" placeholder="Enter your Password"required><br>
        <label>
                    <input type="checkbox" >Remember me
                </label>
            <div class="g-recaptcha" data-sitekey="6LccB-MnAAAAAJ_eSeALRu4UoL-ksuOGt8PS854W"></div>
           


 <input type="submit" name="btnlogin" value="Sign In">

            </form>
       
        
    </form>
    <p>Need Account >>> <a href="customerregister.php">Register</a></p>
    </div>
    
</body>
</html>
