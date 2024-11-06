<!DOCTYPE html>
<html>
<head>
<title>10 Minute Countdown Timer</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="timerbody">
<h2>Countdown Timer: <span id="timer">10:00</span></h2>
<h2>Please try again after the timer.</h2>

 

<script>
        // Give target time for countdown 
        var targetTime = new Date();
        targetTime.setMinutes(targetTime.getMinutes() + 10);
        targetTime.setSeconds(0);

 

 

        // Update countdown every second
        var countdownInterval = setInterval(function () {
            var currentTime = new Date();
            var timeDifference = targetTime - currentTime;

 

 

            // Calculating remaining minutes and seconds
            var minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

 

 

            // Add leading zeros if necessary
            minutes = (minutes < 10 ? "0" : "") + minutes;
            seconds = (seconds < 10 ? "0" : "") + seconds;

 

 

            // Update the timer display
            document.getElementById("timer").innerHTML = minutes + ":" + seconds;

 

 

            // Check if the countdown has reached zero
            if (timeDifference <= 0) {
                clearInterval(countdownInterval);
                document.getElementById("timer").innerHTML = "00:00";
                alert("Countdown timer has ended!");
                window.location='customersignin.php';
            }
        }, 1000); // Update every 1 second
</script>
</body>
</html>