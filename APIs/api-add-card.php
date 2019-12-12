<?php 

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 

session_start();



// INFORMATION FROM THE SIGNUP 
$tIbanCode = $_POST['tIbanCode']; // FOR FUNCTIONALITY - One day it will be credit card/bank number
$tExpirationDate = $_POST['tExpirationDate'];
$tccv = $_POST['tccv'];
$userID = $_SESSION['ID'];



// VARIFY IF THE IBAN ALREADY EXCIST IN THE DATABASE !

    // write the sequence for the database
    $query = "INSERT INTO tcards (userID, ibanCode, expirationDate, ccv)
    VALUES (?, ?, ?, ?)";

    //prepare it
    $stmt = $db->prepare($query);


    // execute the prepared statement
    $ok = $stmt->execute([$userID,$tIbanCode,$tExpirationDate,$tccv]);


// If it doesn't exists the send response to the browser about wrong credentials 
if( $ok == 0){
    
    echo sendResponse(0, 'Wrong Credentials!', __LINE__);
    
}


echo sendResponse(1, 'DONE', __LINE__);

// CLOSING THE CONNECTION TO THE DATABASE 
$db = null;

