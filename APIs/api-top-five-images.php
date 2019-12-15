<?php 

session_start();

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 

if(!$_SESSION){

    header('Location: ../login.php ');
    exit; // Make sure that code doesn't keeep running and deletes people!! 

}

$photographerID = $_SESSION['ID'];


// TOP 5 IMAGES
$topFiveImages = "SELECT count(tpayments.photoID) as countBuys, tphotos.format, tpayments.photoID, tphotos.photoFile as image
FROM tpayments INNER JOIN tphotos ON tpayments.photoID = tphotos.photoID
INNER JOIN tgalleries ON tgalleries.galleryID = tphotos.galleryID
WHERE photographerID = ? GROUP BY photoID LIMIT 3;
";

$stmt = $db->prepare($topFiveImages);
$ok = $stmt->execute([$_SESSION['ID']]); 

$contruct = '[';

while($row = $stmt->fetch()){

    
    $photoID = $row['photoID'];
    $countBuys = $row['countBuys'];
    $photoFile = 'data:image/'. $row['format'] .' ;base64, '. base64_encode(  $row['image'] );

    $contruct .= '{ "countBuys": '. $countBuys .', "photoID": '.$photoID.', "photoFile": "'. $photoFile .'"},';


}

$contruct = substr($contruct, 0, -1);
$contruct .= ']';

$db = null;
echo $contruct;



// SELECT count(tpayments.photoID), tphotos.format, tpayments.photoID
// FROM tpayments INNER JOIN tphotos ON tpayments.photoID = tphotos.photoID
// INNER JOIN tgalleries ON tgalleries.galleryID = tphotos.galleryID
// WHERE photographerID = 3 GROUP BY photoID;