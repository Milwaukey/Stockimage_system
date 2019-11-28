<?php 

    require_once(__DIR__ . '/../includes/connection.php'); 
    require_once(__DIR__ . '/functions.php'); 



    session_start();

    if(!$_SESSION){

        header('Location: ../login.php ');
        exit; // Make sure that code doesn't keeep running and deletes people!! 

    }

    if($SESSION['ID'] != $_GET['ID']){ // CHANGE TO AJAX 

        header('Location: ../login.php ');
        exit; // Make sure that code doesn't keeep running and deletes people!! 

    }





    $sGalleryToBeDeleted = $_GET['ID'];
    
    $query = "DELETE FROM tgalleries WHERE galleryID = $sGalleryToBeDeleted";

    $result = mysqli_query($db, $query);



    // echo sendResponse('1','DONE',__LINE__);
    header('Location:index.php');