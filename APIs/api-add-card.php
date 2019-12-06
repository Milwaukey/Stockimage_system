<?php 

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 

session_start();



// INFORMATION FROM THE SIGNUP 
$tIbanCode = mysqli_real_escape_string($db,$_POST['tIbanCode']); // FOR FUNCTIONALITY - One day it will be credit card/bank number
$tExpirationDate = mysqli_real_escape_string($db,$_POST['tExpirationDate']);
$tccv = mysqli_real_escape_string($db,$_POST['tccv']);
$userID = $_SESSION['ID'];



// VARIFY IF THE IBAN ALREADY EXCIST IN THE DATABASE !


$query = "

INSERT INTO tcards (userID, ibanCode, expirationDate, ccv)
VALUES ('$userID', '$tIbanCode', '$tExpirationDate', '$tccv');

";


$result = mysqli_query($db, $query);

echo sendResponse(1, 'DONE', __LINE__);;

