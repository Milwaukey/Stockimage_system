<?php 
session_start();
require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 

// INFORMATION FROM THE SIGNUP 


$tGalleryName = mysqli_real_escape_string($_POST['tGalleryName']);

$photographerID = $_SESSION['ID'];

$query = "

INSERT INTO tgalleries (photographerID, name)
VALUES ('$photographerID', '$tGalleryName');

";


$result = mysqli_query($db, $query);

echo sendResponse('1', 'DONE', __LINE__);;

