<?php 

    require_once(__DIR__ . '/../includes/connection.php'); 
    require_once(__DIR__ . '/functions.php'); 

    $sPhotoToBeDeleted = $_GET['ID'];
    $query = "DELETE FROM tPhoto WHERE id = $sPhotoToBeDeleted";
    $result = mysqli_query($db, $query);
    //echo sendResponse('1','DONE',__LINE__);