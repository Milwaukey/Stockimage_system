<?php 

    require_once(__DIR__ . '/../includes/connection.php'); 
    require_once(__DIR__ . '/functions.php'); 

    $sUserToBeDeleted = $_GET['ID'];
    $sTable = $_SESSION['type']

    if{$sTable=='photographer'}(
        $sTable='tPhotographers';
    )elseif{
        $sTable=='user'
    }(
        $sTable='tUser';
    )
    $query = "DELETE FROM $sTable WHERE id = $sUserToBeDeleted";
    $result = mysqli_query($db, $query);
    //echo sendResponse('1','DONE',__LINE__);