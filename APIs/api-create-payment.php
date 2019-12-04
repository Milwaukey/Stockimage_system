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

// $query = "
// START TRANSACTION;

// SET @AmountPaid = $iAmountPaid;
// SET @UserID = $userID;
// SET @CardID = $tCardID;
// SET @CardTotalSpending = (SELECT totalAmountPaid FROM tcards WHERE userID = @UserID AND cardID = @CardID) + @AmountPaid; 
// SET @UserTotalSpending = (SELECT totalMonetaryPaid FROM tusers WHERE userID = @UserID) + @AmountPaid; 

// INSERT INTO tpayments (cardID, photoID, payDate, payTime, amountPaid) 
// VALUES ( $tCardID, $tPhotoID, '$dPayDate', '$dPayTime', $iAmountPaid );

// UPDATE tcards SET totalAmountPaid = @CardTotalSpending WHERE userID = @UserID AND cardID = @CardID;
// UPDATE tusers SET totalMonetaryPaid = @UserTotalSpending WHERE userID = @UserID;

// COMMIT;

// ";

$query = "CALL newPayment( $iAmountPaid, $userID, $tCardID, $tPhotoID );";

$reulst = mysqli_multi_query($db, $query);


echo sendResponse(1, 'SUCCES!', __LINE__);
