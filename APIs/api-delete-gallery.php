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

    $galleryid = 1; //HARDED CODED XXX
    $query = "SELECT photoid FROM tphotos WHERE galleryID = $galleryid";
    $results = mysqli_query($db,$query);

    foreach($results as $photoid){
        $query = "UPDATE tpayments SET photoID = NULL WHERE photoID = $photoID";
        mysqli_query($db,$query);
    }
    

    $sGalleryToBeDeleted = $galleryid;
    
    $query = "DELETE FROM tgalleries WHERE galleryID = $sGalleryToBeDeleted";

    $result = mysqli_query($db, $query);



    // echo sendResponse('1','DONE',__LINE__);
    header('Location:index.php');