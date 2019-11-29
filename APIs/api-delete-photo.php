<?php 

    require_once(__DIR__ . '/../includes/connection.php'); 
    require_once(__DIR__ . '/functions.php'); 


    session_start();

    if(!$_SESSION){

        header('Location: ../login.php ');
        exit; // Make sure that code doesn't keeep running and deletes people!! 

    }

    $sPhotoToBeDeleted = $_POST['tPhotoID'];


    // DELETES THE PHOTO FROM THE DATABASE 
    $query = "DELETE FROM tphotos WHERE photoID = $sPhotoToBeDeleted";


    $result = mysqli_query($db, $query);




    echo sendResponse(1,'Photo Deleted!',__LINE__);