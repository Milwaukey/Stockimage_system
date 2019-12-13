<?php 
require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 


$tGalleryName = $_POST['gallery_name_update'];
$galleryID = $_POST['galleryId'];

if( empty($tGalleryName) ){ sendResponse(0, 'You must write a gallery name', __LINE__); }
if( strlen($tGalleryName) < 1 ){ sendResponse(0,'Must be more than 1 character', __LINE__); }
if( strlen($tGalleryName) > 50 ){ sendResponse(0, 'Must be max 50 characters', __LINE__); }


// $photographerID = $_SESSION['ID'];

$query = "

UPDATE tgalleries SET name = ? WHERE galleryID = ? 

";

    $stmt = $db->prepare($query);
    $ok = $stmt->execute([$tGalleryName, $galleryID ]);

$db = null;
echo '{"status": 1, "galleryName": "'.$tGalleryName.'"}';

