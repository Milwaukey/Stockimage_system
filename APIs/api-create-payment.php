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


$query = "CALL newPayment( $iAmountPaid, $userID, $tCardID, $tPhotoID );";

$reulst = mysqli_multi_query($db, $query);


echo sendResponse(1, 'SUCCES!', __LINE__);
