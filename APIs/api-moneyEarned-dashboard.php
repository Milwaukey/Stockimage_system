<?php 

session_start();

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 

if(!$_SESSION){

    header('Location: ../login.php ');
    exit; // Make sure that code doesn't keeep running and deletes people!! 

}

$photographerID = $_SESSION['ID'];


// MONEY EARNED
$getTotaltMoneyEarned = "
SELECT SUM(amountPaid) as totalPaid FROM tpayments INNER JOIN tphotos ON tpayments.photoID = tphotos.photoID INNER JOIN tgalleries ON tgalleries.galleryID = tphotos.galleryID WHERE photographerID = ?;
";

$stmt = $db->prepare($getTotaltMoneyEarned);
$ok = $stmt->execute([$_SESSION['ID']]); 

$contruct = '[';

while($row = $stmt->fetch()){

    
    $amountEarned = $row['totalPaid'];
    $contruct .= '{"amountPaid": '.$amountEarned.'},';


}


$contruct = substr($contruct, 0, -1);
$contruct .= ']';

$db = null;
echo json_encode($contruct);





// // ORDERS
// "
// SELECT tpayments.photoID, amountPaid
// FROM tpayments INNER JOIN tphotos ON tpayments.photoID = tphotos.photoID
// INNER JOIN tgalleries ON tgalleries.galleryID = tphotos.galleryID
// WHERE photographerID = 3;

// ";


// // TOP 5 IMAGES
// "
// SELECT tpayments.photoID
// FROM tpayments INNER JOIN tphotos ON tpayments.photoID = tphotos.photoID
// INNER JOIN tgalleries ON tgalleries.galleryID = tphotos.galleryID
// WHERE photographerID = 3 GROUP BY photoID;

// ";

// // TOP 5 CITIES
// "
// SELECT COUNT(username), cityName
// FROM tcities
// INNER JOIN tusers ON tcities.cityID = tusers.cityID
// INNER JOIN tcards ON tcards.userID = tusers.userID
// INNER JOIN tpayments ON tcards.cardID = tpayments.cardID
// INNER JOIN tphotos ON tpayments.photoID = tphotos.photoID
// INNER JOIN tgalleries ON tgalleries.galleryID = tphotos.galleryID
// WHERE photographerID = 3 GROUP BY cityName ORDER BY username LIMIT 5;
// ";
