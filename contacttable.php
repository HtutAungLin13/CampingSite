<?php 
session_start();
include('connection.php');
$select = "SELECT * FROM contacts";
$query = mysqli_query($connect, $select);
$count = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="GWSC.css">
    <title>View Contacts</title>
</head>
<body>
    <div class="tablecontact">
        <h3>Contact Table</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Contact Message</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($query)) {
                    $conid = $row['ContactID'];
                    $conmsg = $row['ContactMessage'];
                    $conemail = $row['Email'];
                    $conphno = $row['PhoneNumber'];
                    echo "<tr>";
                    echo "<td>$conid</td>";
                    echo "<td>$conmsg</td>";
                    echo "<td>$conemail</td>";
                    echo "<td>$conphno</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <p class="nocontactdata">
            <?php
            if ($count == 0) {
                echo "No records";
            }
            ?>
        </p>
    </div>
</body>
</html>
