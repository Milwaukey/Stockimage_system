<?php 

session_start();

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 

// if(!$_SESSION){

//     header('Location: ../login.php ');
//     exit; // Make sure that code doesn't keeep running and deletes people!! 

// }

// if($SESSION['type'] != 'photographer'){

//     header('Location: ../login.php ');
//     exit; // Make sure that code doesn't keeep running and deletes people!! 

// }

$photographerID = $_SESSION['ID'];


// TOP FIVE CITIES
$getAllOrders = " SELECT COUNT(username) AS countOfBuys, cityName
FROM tcities
INNER JOIN tusers ON tcities.cityID = tusers.cityID
INNER JOIN tcards ON tcards.userID = tusers.userID
INNER JOIN tpayments ON tcards.cardID = tpayments.cardID
INNER JOIN tphotos ON tpayments.photoID = tphotos.photoID
INNER JOIN tgalleries ON tgalleries.galleryID = tphotos.galleryID
WHERE photographerID = ? GROUP BY cityName ORDER BY username LIMIT 5;
";

$stmt = $db->prepare($getAllOrders);
$ok = $stmt->execute([$_SESSION['ID']]); 

$contruct = '[';

while($row = $stmt->fetch()){

    
    $countOfBuysInSpecificCity = $row['countOfBuys'];
    $cityName = $row['cityName'];

    $contruct .= '{"cityName": "'.$cityName.'", "countOfBuys": '. $countOfBuysInSpecificCity .'},';

}


$contruct = substr($contruct, 0, -1);
$contruct .= ']';

$db = null;
echo $contruct;

