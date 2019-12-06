<?php 

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 

// INFORMATION FROM THE SIGNUP 

$tName = mysqli_real_escape_string($db,$_POST['tName']);
$tSurname = mysqli_real_escape_string($db,$_POST['tSurname']);
$tEmail = mysqli_real_escape_string($db,$_POST['tEmail']);
$tUsername = mysqli_real_escape_string($db,$_POST['tUsername']);

$writtenPassword = mysqli_real_escape_string($db,$_POST['tPassword']);
$tPassword = password_hash($writtenPassword, PASSWORD_DEFAULT);

$tStreetName = mysqli_real_escape_string($db,$_POST['tStreetName']);
$tStreetNumber = mysqli_real_escape_string($db,$_POST['tStreetNumber']);
$tZipcode = mysqli_real_escape_string($db,$_POST['tZipcode']);
$tCity = mysqli_real_escape_string($db,$_POST['tCity']);


// $signupDate = date('Y-m-d', time() );
$signupDate = date('Y-m-d', time() );

$query = "

INSERT INTO tusers (name, surname, email, username, password, streetName, streetNumber, zipcode, cityID, signupDate )
VALUES ('$tName', '$tSurname', '$tEmail', '$tUsername' , '$tPassword', '$tStreetName', '$tStreetNumber', '$tZipcode', $tCity, DATE '$signupDate' );

";


mysqli_query($db, $query);


echo sendResponse('1', 'DONE', __LINE__);;

