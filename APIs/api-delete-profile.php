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
    $sTable = $_SESSION['type'];




 echo $sTable;
 echo $sUserToBeDeleted;



    if( $sTable == 'photographer' ){


        $sTable='tphotographers';
        $sIdType = 'photographerID';


    }elseif( $sTable=='user'){


        $sTable='tusers';
        $sIdType = 'userID';

        
    }


    // $query = "DELETE FROM $sTable WHERE $sIdType = $sUserToBeDeleted";
    // $result = mysqli_query($db, $query);

    $query = "UPDATE $sTable SET deleteDate = date('Y-m-d', time()), active = 0  WHERE $sIdType = $sUserToBeDeleted";
    $result = mysqli_query($db, $query);
    if( $sTable == 'photographer' ){


     $query = "SELECT COUNT(name)
     FROM tgalleries
     WHERE photographerID = $sUserToBeDeleted;";
    $count = mysqli_affected_rows($query);
    for ($i = 1; $i <= $count; $i++) {
            //NEEDS TO WORK WITH THE INCLUDED FILE!!!!!!
        include "api-delete-gallery.php";
    };
    };
    session_destroy();

    header('Location: ../index.php');

 