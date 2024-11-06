<?php 

include('connection.php');

$AdminTb="CREATE TABLE Admins
(
	AdminID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Adminname varchar(30),
	PhoneNumber varchar(30),
	Email varchar(30),
	Password int,
	Address varchar(30),
	Position varchar(30)
)";
 $query=mysqli_query($connect,$AdminTb);
if ($query) 
{
	echo "Admin Table Set up Successfully";
}
else
 {
	echo"error in Admin";
 }


 $CustomerTb="CREATE TABLE Customers
(
	CustomerID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Firstname varchar(30),
	Surname varchar(30),
	PhoneNumber varchar(30),
	Email varchar(30),
	Password varchar(30),
	Address varchar(30),
	ViewCount int
)";
 $query=mysqli_query($connect,$CustomerTb);
if ($query) 
{
	echo "Customer Table Set up Successfully";
}
else
 {
	echo"error in Customer";
 }


 $CampsiteTb="CREATE TABLE Campsites
(
	CampsiteID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	CampsiteName varchar(30),
	Location varchar(100)
)";
 $query=mysqli_query($connect,$CampsiteTb);
if ($query) 
{
	echo "Campsite Table Set up Successfully";
}
else
 {
	echo"error in Campsite";
 }


 $PitchtypeTb="CREATE TABLE Pitchtypes
(
	PitchtypeID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Pitchtype varchar(30),
	Description varchar(255)
)";
 $query=mysqli_query($connect,$PitchtypeTb);
if ($query) 
{
	echo "Pitchtype Table Set up Successfully";
}
else
 {
	echo"error in Pitchtype";
 }


$ContactTb="CREATE TABLE Contacts
(
	ContactID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	ContactMessage varchar(255),
	Email varchar(30),
	PhoneNumber varchar(30)
)";
 $query=mysqli_query($connect,$ContactTb);
if ($query) 
{
	echo "Contact Table Set up Successfully";
}
else
 {
	echo"error in Contact";
 }


 $ReviewTb="CREATE TABLE Reviews
(
	ReviewID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Review varchar(100),
	Rating int,	
	Status varchar(90),
	CustomerID int,
	Foreign Key (CustomerID) references Customers (CustomerID)
)";
 $query=mysqli_query($connect,$ReviewTb);
if ($query) 
{
	echo "Review Table Set up Successfully";
}
else
 {
	echo"error in Review";
 }


$PitchTb="CREATE TABLE Pitches
(
	PitchID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	PitchName varchar(100),
	PitchImage varchar(255),
	Location text,
	FacilityName1 varchar(255),
	FacilityName2 varchar(255),
	FacilityName3 varchar(255),
	FacilityImage1 varchar(255),
	FacilityImage2 varchar(255),
	FacilityImage3 varchar(255),
	LocalattractionName1 varchar(255),
	LocalattractionName2 varchar(255),
	LocalattractionName3 varchar(255),
	LocalattractionImage1 varchar(255), 
	LocalattractionImage2 varchar(255),
	LocalattractionImage3 varchar(255),
	Price int,
	Description varchar(255),
	Status varchar(255),
	Duration varchar(90),
	CampsiteID int,
	PitchtypeID int,
	Foreign Key (CampsiteID) references Campsites (CampsiteID),
	Foreign Key (PitchtypeID) references Pitchtypes (PitchtypeID)
)";
 $query=mysqli_query($connect,$PitchTb);
if ($query) 
{
	echo "Pitch Table Set up Successfully";
}
else
 {
	echo"error in Pitch";
 }


 $BookingTb = "CREATE TABLE Bookings
(
	BookingID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	BookingDate varchar(100),
	Price int,
	BookingQuantity int,
	Total int,
	Tax int,
	Description varchar(255),
	Status varchar(255),
	CustomerEmail varchar(100),
	PitchID int,
	CustomerID int,
	Foreign Key (CustomerID) references Customers(CustomerID),
	Foreign Key (PitchID) references Pitches(PitchID) 
)";
 $query=mysqli_query($connect,$BookingTb);
if ($query) 
{
	echo "Booking Table Set up Successfully";
}
else
 {
	echo"error in Booking";
 }

 ?>