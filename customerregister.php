<?php
include('connection.php'); 
if (isset($_POST['btnsubmit'])) 
    {
        $fname=$_POST['txtfirstname'];
        $sname=$_POST['txtsurname'];
        $cphoneno=$_POST['txtcusphonenum'];
        $cemail=$_POST['txtcusemail'];
        $cpassword=$_POST['txtcuspassword'];
        $caddress=$_POST['txtcusaddress'];
        
        $checkemail="SELECT * from customers where Email='$email'";
        $result=mysqli_query($connect,$checkemail);
        $count=mysqli_num_rows($result);


        $passlength = 8; 
        $passupcase = preg_match('/[A-Z]/', $cpassword);
        $passlowcase = preg_match('/[a-z]/', $cpassword);
        $passdigit = preg_match('/\d/', $cpassword);

    if (
        strlen($cpassword) < $passlength ||
        !$passupcase ||
        !$passlowcase ||
        !$passdigit
    ) {
        echo "<script>window.alert('Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, and one digit.')</script>";
        echo "<script>window.location='customerregister.php'</script>";
    } else {
        $checkemail = "SELECT * FROM customers WHERE Email='$email'";
        $result = mysqli_query($connect, $checkemail);
        $count = mysqli_num_rows($result);

        if ($count>0) 
        {
            echo "<script>window.alert('Customer Email already exist! Please Register Again')</script>";
            echo "<script>window.location='customerregister.php'</script>";
        }
        else
        {
            $captchase = '6LccB-MnAAAAAL2ZClT0V_bdPr72dDmYebDPe9Cq';
            $captchare = $_POST['g-recaptcha-response'];
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$captchase&response=$captchare");
            $responsekey = json_decode($response, true);

            if (intval($responsekey["success"]) !== 1) {
                // CAPTCHA verification failed
                echo "<script>window.alert('CAPTCHA verification failed. Please try again.')</script>";
                echo "<script>window.location='customerregister.php'</script>";
                } 
                else 
                {
                // CAPTCHA verification successful
                // Proceed with database insertion...
                $insert = "INSERT INTO customers(Firstname,Surname,PhoneNumber,Email,Password,Address,viewcount) Values('$fname','$sname','$cphoneno','$cemail','$cpassword','$caddress',1)";
                $finalresult = mysqli_query($connect, $insert);

                if ($finalresult) 
                    {
                        echo "<script>window.alert('Customer Registered successfully')</script>";
                        echo "<script>window.location='customersignin.php'</script>";
                    }
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
    <title>Customer Registration</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="GWSC.css">
</head>
<body>
    
    <div class="container">
    <h2>Customer Registration Form</h2>
     <hr class="boldhr">
    <form class="form-container" action="customerregister.php" method="POST">
        <label for="firstname">Firstname:</label>
        <input type="text" id="firstname" name="txtfirstname" required><br>
        
        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="txtsurname" required><br>
        
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="txtcusphonenum" required><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="txtcusemail" required><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="txtcuspassword" required><br>

        <label>Address</label>
        <textarea name="txtcusaddress"required/></textarea><br>

        <div class="g-recaptcha" data-sitekey="6LccB-MnAAAAAJ_eSeALRu4UoL-ksuOGt8PS854W"></div>

        <div class="button-container">
        <input type="submit" name="btnsubmit" value="Register">
        <input type="clear" value="Clear">
        </div>
        
        
    </form>
    <p>Already have an account? <a href="customersignin.php">Signin</a></p>
    </div>

    
</body>
</html>
