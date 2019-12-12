<?php 
session_start();
require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 

// INFORMATION FROM THE SIGNUP 


$tGalleryName = $_POST['tGalleryName'];
$photographerID = $_SESSION['ID'];

$query = "

INSERT INTO tgalleries (photographerID, name)
VALUES (?, ?);

";
    //prepare it
    $stmt = $db->prepare($query);
    // execute the prepared statement
    $ok = $stmt->execute([$photographerID,$tGalleryName]);

echo sendResponse('1', 'DONE', __LINE__);
$db = null;

