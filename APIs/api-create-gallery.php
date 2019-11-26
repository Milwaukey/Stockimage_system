<?php 
session_start();
require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 

// INFORMATION FROM THE SIGNUP 


$tGalleryName = $_POST['tGalleryName'];

$photographerID = $_SESSION['photographerID'];

// HARDED NUMBER OF PHOTOTS  /// REMOOOOOOOVE THIIIIIIIIIIS 
$numberOfPhotosInGallery = 0;

$query = "

INSERT INTO tgalleries (photographerID, name, numberOfPhotos)
VALUES ('$photographerID', '$tGalleryName', '$numberOfPhotosInGallery');

";


$result = mysqli_query($db, $query);

echo sendResponse('1', 'DONE', __LINE__);;

