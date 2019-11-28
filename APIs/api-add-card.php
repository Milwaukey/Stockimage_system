<?php 

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 

session_start();



// INFORMATION FROM THE SIGNUP 
$tIbanCode = $_POST['tIbanCode']; // FOR FUNCTIONALITY - One day it will be credit card/bank number
$tExpirationDate = $_POST['tExpirationDate'];
$tccv = $_POST['tccv'];
$userID = $_SESSION['ID'];


$query = "

INSERT INTO tcards (userID, ibanCode, expirationDate, ccv)
VALUES ('$userID', '$tIbanCode', '$tExpirationDate', '$tccv');

";


$result = mysqli_query($db, $query);

echo sendResponse(1, 'DONE', __LINE__);;

