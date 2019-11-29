<?php 

    require_once(__DIR__ . '/../includes/connection.php'); 
    require_once(__DIR__ . '/functions.php'); 



    session_start();

    if(!$_SESSION){

        header('Location: ../login.php ');
        exit; // Make sure that code doesn't keeep running and deletes people!! 

    }

    $galleryid = 1; //HARDED CODED XXX




// SETS PAYMENT PHOTO ID TO NULL
    $query = "SELECT photoID FROM tphotos WHERE galleryID = $galleryid";
    $results = mysqli_query($db,$query);

    foreach($results as $photoid){

        $i = $photoid['photoID'];

        $query = "UPDATE tpayments SET photoID = NULL WHERE photoID = $i";
        mysqli_query($db,$query);
    
    
        // DELETE PHOTOS 
        $query = "DELETE FROM tphotos WHERE photoID = $i";

        mysqli_query($db, $query);


    }


// DELETE GALLERY
    $sGalleryToBeDeleted = $galleryid;
    
    $query = "DELETE FROM tgalleries WHERE galleryID = $sGalleryToBeDeleted";

    $result = mysqli_query($db, $query);


    echo sendResponse('1','DONE',__LINE__);