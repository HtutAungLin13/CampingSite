<?php
session_start();
include('connection.php');

$select = "SELECT * FROM bookings";
$query = mysqli_query($connect, $select);
$count = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="GWSC.css">
    <title>Booking List</title>
</head>
<body>
    <div class="booktablecontainer">
        <h1>Booking List</h1>
        <div class="booktable">
            <table>
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Booking Date</th>
                        <th>Pitch Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Tax</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Pitch ID</th>
                        <th>Customer ID</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    while ($row = mysqli_fetch_array($query)) {
                        $bookid = $row['BookingID'];
                        $bookd = $row['BookingDate'];
                        $bprice = $row['Price'];
                        $bqty = $row['BookingQuantity'];
                        $btotal = $row['Total'];
                        $btax = $row['Tax'];
                        $bdes = $row['Description'];
                        $bsts = $row['Status'];
                        $pitchid = $row['PitchID'];
                        $cusid = $row['CustomerID'];

                        echo "<tr>";
                        echo "<td>$bookid</td>";
                        echo "<td>$bookd</td>";
                        echo "<td>$bprice</td>";
                        echo "<td>$bqty</td>";
                        echo "<td>$btotal</td>";
                        echo "<td>$btax</td>";
                        echo "<td>$bdes</td>";
                        echo "<td>$bsts</td>";
                        echo "<td>$pitchid</td>";
                        echo "<td>$cusid</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
             <p class="nobookdata">
            <?php
            if ($count == 0) {
                echo "No Data";
            }
            ?>
        </p>
        </div>
    </div>
    
</body>
</html>

