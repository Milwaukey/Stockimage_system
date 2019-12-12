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



$stmt = $db->prepare(
"INSERT INTO tcards (userID, ibanCode, expirationDate, ccv)
VALUES (?, ?, ?, ?)"
);

   
$stmt->bind_param("isss", $userID,$tIbanCode,$tExpirationDate,$tccv);

$ok = $stmt->execute();


// If it doesn't exists the send response to the browser about wrong credentials 
if( $ok == 0){
    
    echo sendResponse(0, 'Wrong Credentials!', __LINE__);
    
}

// BELONGS TO THE STMT - DB - PREPARE - OK - BIND->PARAM PART 
$results = mysqli_stmt_get_result($stmt);





echo sendResponse(1, 'DONE', __LINE__);

