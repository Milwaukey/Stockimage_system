<?php 

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 


session_start();

if(!$_SESSION){

    header('Location: ../login.php ');
    exit; // Make sure that code doesn't keeep running and deletes people!! 

}

    $sPhotoId =  $_POST['tPhotoID'];
    $query = "UPDATE tpayments SET photoID = NULL WHERE photoID = $sPhotoId";

    $results = mysqli_query($db, $query);

    
    echo sendResponse(1,'Set value to Null',__LINE__);