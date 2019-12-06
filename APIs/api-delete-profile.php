<?php 

    require_once(__DIR__ . '/../includes/connection.php'); 
    require_once(__DIR__ . '/functions.php'); 

    session_start();

    if(!$_SESSION){

        header('Location: ../login.php ');
        exit; // Make sure that code doesn't keeep running and deletes people!! 

    }

    if($SESSION['ID'] != $_GET['ID']){

        header('Location: ../login.php ');
        exit; // Make sure that code doesn't keeep running and deletes people!! 

    }

    $sUserToBeDeleted = $_GET['ID'];
    $type = $_SESSION['type'];


    if( $type == 'photographer' ){


        $query = "SELECT galleryID FROM tgalleries WHERE photographerID = $sUserToBeDeleted";

        $results = mysqli_query($db, $query);


        while($row = mysqli_fetch_array($results)){

            $galleryid = $row['galleryID'];
            
            // SETS PAYMENT PHOTO ID TO NULL
            $query_2 = "SELECT photoID FROM tphotos WHERE galleryID = $galleryid";
            $results_2 = mysqli_query($db,$query_2);

            foreach($results_2 as $photoid){

                $i = $photoid['photoID'];

                $query = "UPDATE tpayments SET photoID = NULL WHERE photoID = $i";
                mysqli_query($db,$query);
            
            
                // DELETE PHOTOS 
                $query = "DELETE FROM tphotos WHERE photoID = $i";

                mysqli_query($db, $query);


            }


                // DELETE GALLERY
                $sGalleryToBeDeleted = $galleryid;
                
                $query_2 = "DELETE FROM tgalleries WHERE galleryID = $sGalleryToBeDeleted";
                mysqli_query($db, $query_2);

                    
        }


        // DELETE PROFILE PHOTOGRAPHER

        $query = "DELETE FROM tphotographers WHERE photographerID = $sUserToBeDeleted";
        mysqli_query($db, $query);



    }elseif( $type == 'user'){

        $deleteDate = date('Y-m-d', time() );


        $query = "UPDATE tusers SET deleteDate = '$deleteDate', active = 0 WHERE userID = $sUserToBeDeleted";
        $result = mysqli_query($db, $query);


    }


    session_destroy();

    header('Location: ../index.php');
