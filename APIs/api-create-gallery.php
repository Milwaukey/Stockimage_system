<?php 

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 

// INFORMATION FROM THE SIGNUP 


$tGalleryName = $_POST['tGalleryName'];

$photographerID = $_POST['photographerID'];

// HARDED NUMBER OF PHOTOTS 
$numberOfPhotosInGallery = 2;

$query = "

INSERT INTO tgalleries (photographerID, name, numberOfPhotos)
VALUES ('$photographerID', '$tGalleryName', '$numberOfPhotosInGallery');

";


$result = mysqli_query($db, $query);

echo sendResponse('1', 'DONE', __LINE__);;

