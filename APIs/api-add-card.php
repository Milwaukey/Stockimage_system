<?php 

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 

session_start();

if(!$_SESSION){

    header('Location: ../login.php ');
    exit; // Make sure that code doesn't keeep running and deletes people!! 

}

// INFORMATION FROM THE SIGNUP 
$tIbanCode = $_POST['tIbanCode']; // FOR FUNCTIONALITY - One day it will be credit card/bank number
if( empty($tIbanCode) ){ sendResponse(0, 'You must write a iban code', __LINE__); }
if( strlen($tIbanCode) < 18 ){ sendResponse(0,'IBAN code must be 18 characters', __LINE__); }
if( strlen($tIbanCode) > 18 ){ sendResponse(0,'IBAN code must be 18 characters', __LINE__); }

// 001234567890123456
// write the sequence for the database
$checkIbanCodeExist = "SELECT ibanCode FROM tcards WHERE ibanCode = ?";

//prepare it
$stmt = $db->prepare($checkIbanCodeExist);

// execute the prepared statement
$ok = $stmt->execute([$tIbanCode]);

while($row = $stmt->fetch()){

    if( !empty( $row['ibanCode'] ) ){
        sendResponse(0 ,'ibanCode already exist in the system', __LINE__);
    }

}

$tExpirationDate = $_POST['tExpirationDate'];
if( empty($tExpirationDate) ){ sendResponse(0, 'You must write a iban code', __LINE__); }
if( strlen($tExpirationDate) < 4 ){ sendResponse(0,'It must be 4 characters', __LINE__); }
if( strlen($tExpirationDate) > 4 ){ sendResponse(0,'It must be 4 characters', __LINE__); }

$tccv = $_POST['tccv'];
if( empty($tccv) ){ sendResponse(0, 'You must write a ccv', __LINE__); }
if( strlen($tccv) < 3 ){ sendResponse(0,'It must be 3 characters', __LINE__); }
if( strlen($tccv) > 3 ){ sendResponse(0,'It must be 3 characters', __LINE__); }


$userID = $_SESSION['ID'];


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


// CLOSING THE CONNECTION TO THE DATABASE 
$db = null;

echo sendResponse(1, 'DONE', __LINE__);


