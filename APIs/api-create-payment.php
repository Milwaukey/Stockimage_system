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
$iAmountPaid = $_POST['tPrice'];

// VALIDATION 



// $query = "

//     INSERT INTO tpayments (cardID, photoID, payDate, payTime, amountPaid) 
//     VALUES ( $tCardID, $tPhotoID, '$dPayDate', '$dPayTime', $iAmountPaid );

// ";


mysqli_query($db, $query);


echo sendResponse(1, 'SUCCES!', __LINE__);






// PAYMENT ID // CARD ID // PHOTOID // PAYDATE // PAYTIME // AMOUNT PAID 



// Price to tphotos
// amount paid tpayments
//  total amount paid tcards
//   total monetary paid tusers
$id= $_SESSION['ID'];
// $query = "

// SELECT tcards.totalAmountPaid, tusers.totalMonetaryPaid
// FROM tcards
// INNER JOIN tusers ON tcards.userID = tuser.userID

// ";
// $results = mysqli_query($db,$query);
// $row = mysqli_fetch_array($result, MYSQLI_NUM);

// $iCardTotalSpend = $row[0] + $iAmountPaid;
// $iUserTotalSpend = $row[1] + $iAmountPaid;

$query = " 
START TRANSACTION 

SET @AmountPaid = $iAmountPaid;
SET @UserID = $id;
SET @CardTotalSpending = (SELECT totalAmountPaid FROM tcards WHERE userID = @UserID) + @AmountPaid; 
SET @UserTotalSpending = (SELECT totalMonetaryPaid FROM tusers WHERE userID = @UserID) + @AmountPaid; 


INSERT INTO tpayments (cardID, photoID, payDate, payTime, amountPaid) 
VALUES ( $tCardID, $tPhotoID, '$dPayDate', '$dPayTime', $iAmountPaid );


UPDATE tcards SET totalAmountpaid = @CardTotalSpending WHERE userID = @UserID;
UPDATE tusers SET totalMonetarypaid = @UserTotalSpending WHERE userID = @UserID;


";

$results = mysqli_query($db,$query);
