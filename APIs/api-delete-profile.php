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


        $query = "SELECT galleryID FROM tgalleries WHERE photographerID = ?";
        $stmt = $db->prepare($query);
        $ok = $stmt->execute([$sUserToBeDeleted]);


        while($row = $stmt->fetch()){

            $galleryid = $row['galleryID'];
            
            // SETS PAYMENT PHOTO ID TO NULL
            $query_2 = "SELECT photoID FROM tphotos WHERE galleryID = ?";
            
            $stmt = $db->prepare($query_2);
            $ok = $stmt->execute([$galleryid]);


            $results_2 = $stmt->fetchAll();

            foreach($results_2 as $photoid){

                $i = $photoid['photoID'];

                $query = "UPDATE tpayments SET photoID = NULL WHERE photoID = ?";
                $stmt = $db->prepare($query);
                $ok = $stmt->execute([$i]);
            
            
                // DELETE PHOTOS 
                $query = "DELETE FROM tphotos WHERE photoID = ?";
                $stmt = $db->prepare($query);
                $ok = $stmt->execute([$i]);


            }


                // DELETE GALLERY
                $sGalleryToBeDeleted = $galleryid;
                
                $query_2 = "DELETE FROM tgalleries WHERE galleryID = ?";
                $stmt = $db->prepare($query_2);
                $ok = $stmt->execute([$sGalleryToBeDeleted]);

                    
        }


        // DELETE PROFILE PHOTOGRAPHER

        $query = "DELETE FROM tphotographers WHERE photographerID = ?";
        $stmt = $db->prepare($query);
        $ok = $stmt->execute([$sUserToBeDeleted]);



    }elseif( $type == 'user'){

        $deleteDate = date('Y-m-d', time() );


        $query = "UPDATE tusers SET deleteDate = ?, active = 0 WHERE userID = ?";
        $stmt = $db->prepare($query);
        $ok = $stmt->execute([$deleteDate,$sUserToBeDeleted]);


    }

    session_destroy();
    $db = null;
    header('Location: ../index.php');