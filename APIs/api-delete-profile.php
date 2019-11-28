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


    $query = "DELETE FROM $sTable WHERE $sIdType = $sUserToBeDeleted";
    $result = mysqli_query($db, $query);

    session_destroy();

    header('Location: ../index.php');