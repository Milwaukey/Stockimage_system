<?php 

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 

session_start();

if(!$_SESSION){
    
    header('Location: ../login.php ');
    exit; // Make sure that code doesn't keeep running and deletes people!! 
     
}


$tCardID = $_POST['tCardID'];
$tPhotoID = $_POST['tPhotoID'];
$dPayDate = date('Y-m-d', time() );
$dPayTime = date('H:i:s');
$iAmountPaid = floatVal($_POST['tPrice']);

$userID= $_SESSION['ID'];


    $query = "CALL newPayment( ?, ?, ?, ? );";

    //prepare it
    $stmt = $db->prepare($query);
    $ok = $stmt->execute([$iAmountPaid, $userID, $tCardID, $tPhotoID]);


    $db = null;
echo sendResponse(1, 'SUCCES!', __LINE__);
