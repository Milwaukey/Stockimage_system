<?php 

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 


session_start();

if(!$_SESSION){

    header('Location: ../login.php ');
    exit; // Make sure that code doesn't keeep running and deletes people!! 
}

    $sGalleryId =  $_POST['galleryID'];

    $query = "DELETE FROM tphotos WHERE galleryID = ?";
    
    //prepare it
    $stmt = $db->prepare($query);


    // execute the prepared statement
    $ok = $stmt->execute([$sGalleryId]);
    
    $db = null;
    echo sendResponse(1,'photos deleted',__LINE__);