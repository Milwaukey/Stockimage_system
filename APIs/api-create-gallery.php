<?php 
session_start();
require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 

// INFORMATION FROM THE SIGNUP 


$tGalleryName = $_POST['tGalleryName'];
if( empty($tGalleryName) ){ sendResponse(0, 'You must write a gallery name', __LINE__); }
if( strlen($tGalleryName) < 1 ){ sendResponse(0,'Must be more than 1 character', __LINE__); }
if( strlen($tGalleryName) > 50 ){ sendResponse(0, 'Must be max 50 characters', __LINE__); }


$photographerID = $_SESSION['ID'];

$query = "

INSERT INTO tgalleries (photographerID, name)
VALUES (?, ?);

";

    $stmt = $db->prepare($query);
    $ok = $stmt->execute([$photographerID,$tGalleryName]);

echo sendResponse('1', 'DONE', __LINE__);
$db = null;

