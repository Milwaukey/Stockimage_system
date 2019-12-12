<?php 

    require_once(__DIR__ . '/../includes/connection.php'); 
    require_once(__DIR__ . '/functions.php'); 


    session_start();

    if(!$_SESSION){

        header('Location: ../login.php ');
        exit; // Make sure that code doesn't keeep running and deletes people!! 

    }

    $sPhotoToBeDeleted = $_POST['tPhotoID'];


        // UPDATE THE GALLERY  with the number of  images added
        $query2 = "SELECT numberOfPhotos FROM tgalleries INNER JOIN tphotos ON tgalleries.galleryID = tphotos.galleryID WHERE photoID = ? " ;
        $stmt = $db->prepare($query2);
        // execute the prepared statement
        $ok = $stmt->execute([$sPhotoToBeDeleted]);
        

        // var_dump($result2);
    
        while($row = $stmt->fetch()){
    
            $numberOfPhotos = $row['numberOfPhotos'];
        
            $newNumberOfPhotos = $numberOfPhotos-1;
        
            $query3 = "UPDATE tgalleries INNER JOIN tphotos ON tgalleries.galleryID = tphotos.galleryID SET tgalleries.numberOfPhotos = ? WHERE photoID = ?";
    
            $stmt = $db->prepare($query3);
            // execute the prepared statement
            $ok = $stmt->execute([$newNumberOfPhotos, $sPhotoToBeDeleted]);
        
        
        }


    // DELETES THE PHOTO FROM THE DATABASE 
    $query = "DELETE FROM tphotos WHERE photoID = $sPhotoToBeDeleted";

    $stmt = $db->prepare($query);
    // execute the prepared statement
    $ok = $stmt->execute([$sPhotoToBeDeleted]);

    // var_dump($result);

    echo sendResponse(1,'Photo Deleted!',__LINE__);
    $db = null;