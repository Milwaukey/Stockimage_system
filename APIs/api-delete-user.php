<?php 

    require_once(__DIR__ . '/../includes/connection.php'); 
    require_once(__DIR__ . '/functions.php'); 

    $userToBeDeleted = $_GET['userID'];
    $query = 'DELETE FROM tusers WHERE id = $userToBeDeleted';
    $result = mysqli_query($db, $query);
    echo sendResponse('1','DONE',__LINE__);