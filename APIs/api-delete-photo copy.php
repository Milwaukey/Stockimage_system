<?php 

    require_once(__DIR__ . '/../includes/connection.php'); 
    require_once(__DIR__ . '/functions.php'); 

    $sGalleryToBeDeleted = $_GET['ID'];
    $query = "DELETE FROM tGalleries WHERE id = $sGalleryToBeDeleted";
    $result = mysqli_query($db, $query);
    //echo sendResponse('1','DONE',__LINE__);
    header('Location:index.php')