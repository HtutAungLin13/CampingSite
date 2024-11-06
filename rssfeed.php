<?xml version='1.0' encoding='UTF-8' ?>
<rss version='2.0'>
    <channel>
        <title>Global Wild Swimming and Camping</title>      
<?php 
include('connection.php'); 
header('Content-Type: text/xml');
$sql = "SELECT * from rssfeed order by RSSfeedID desc";        
$result = mysqli_query($connect, $sql);    
$num_rows = mysqli_num_rows($result);
for ($i = 0; $i < $num_rows; $i++) 
{
    $row = mysqli_fetch_array($result);
    echo "<item>";
    echo "<title>".$row['Title']."</title>";
    echo "<description>".$row['Description']."</description>";
    echo "<url>".$row['url']."</url>";
    echo "</item>";
}
 ?>
</channel>
</rss>


