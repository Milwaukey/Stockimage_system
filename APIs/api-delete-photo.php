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
        $query2 = "SELECT numberOfPhotos FROM tgalleries INNER JOIN tphotos ON tgalleries.galleryID = tphotos.galleryID WHERE photoID = " . $sPhotoToBeDeleted;
        $result2 = mysqli_query($db, $query2);

        // var_dump($result2);
    
        while($row = mysqli_fetch_array($result2)){
    
            $numberOfPhotos = $row['numberOfPhotos'];
        
            $newNumberOfPhotos = $numberOfPhotos-1;
        
            $query3 = "UPDATE tgalleries INNER JOIN tphotos ON tgalleries.galleryID = tphotos.galleryID SET tgalleries.numberOfPhotos = " . $newNumberOfPhotos ." WHERE photoID = " . $sPhotoToBeDeleted;
    
            mysqli_query($db, $query3);
        
        
        }


    // DELETES THE PHOTO FROM THE DATABASE 
    $query = "DELETE FROM tphotos WHERE photoID = $sPhotoToBeDeleted";

    $result = mysqli_query($db, $query);

    // var_dump($result);

    echo sendResponse(1,'Photo Deleted!',__LINE__);