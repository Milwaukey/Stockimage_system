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


// MONEY EARNED
$getAllOrders = " SELECT paymentID, tpayments.photoID, payDate, amountPaid
FROM tpayments INNER JOIN tphotos ON tpayments.photoID = tphotos.photoID
INNER JOIN tgalleries ON tgalleries.galleryID = tphotos.galleryID
WHERE photographerID = ?;
";

$stmt = $db->prepare($getAllOrders);
$ok = $stmt->execute([$_SESSION['ID']]); 

$contruct = '[';

while($row = $stmt->fetch()){

    
    $galleryName = $row['paymentID'];
    $photoID = $row['photoID'];
    $amountPaid = $row['amountPaid'];
    $payDate = $row['payDate'];

    $contruct .= '{"orderID": "'.$galleryName.'", "photoID": '. $photoID .', "price": '. $amountPaid .', "payDate": "'.$payDate.'" },';

}


$contruct = substr($contruct, 0, -1);
$contruct .= ']';

$db = null;
echo $contruct;
