<?php 

    require_once(__DIR__ . '/../includes/connection.php'); 
    require_once(__DIR__ . '/functions.php'); 

    session_start();

    if(!$_SESSION){

        header('Location: ../login.php ');
        exit; // Make sure that code doesn't keeep running and deletes people!! 

    }

    $galleryid = $_GET['id'];

    

// SETS PAYMENT PHOTO ID TO NULL
    $query = "SELECT photoID FROM tphotos WHERE galleryID = ?";
    $stmt = $db->prepare($query);
    // execute the prepared statement
    $ok = $stmt->execute([$galleryid]);


if($ok == true){

    $photos = $stmt->fetchAll();
    foreach($photos as $photoid){

        $i = $photoid['photoID'];

        $query = "UPDATE tpayments SET photoID = NULL WHERE photoID = ?";
        $stmt = $db->prepare($query);
        // execute the prepared statement
        $ok = $stmt->execute([$i]);
    
    
        // DELETE PHOTOS 
        $query = "DELETE FROM tphotos WHERE photoID = ?";

        $stmt = $db->prepare($query);
        // execute the prepared statement
        $ok = $stmt->execute([$i]);


    }

}


// DELETE GALLERY
    $sGalleryToBeDeleted = $galleryid;
    
    $query = "DELETE FROM tgalleries WHERE galleryID = ?";

    $stmt = $db->prepare($query);
    // execute the prepared statement
    $ok = $stmt->execute([$sGalleryToBeDeleted]);


    $db = null;
    header('Location: ../galleries-overview.php');