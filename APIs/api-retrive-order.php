<?php 

session_start();
require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 


$orderID = $_POST['orderId'];
$userID = $_SESSION['ID'];


    $query2 = "SELECT tpayments.paymentID, tcards.ibanCode, tpayments.payDate, tpayments.amountPaid, format, hDimension, vDimension, photoFile, tpayments.photoID
    FROM tpayments LEFT JOIN tcards ON tpayments.cardID = tcards.cardID
    LEFT JOIN tphotos ON tpayments.photoID = tphotos.photoID
    WHERE userID = ? AND paymentID = ? LIMIT 1";

    $stmt = $db->prepare($query2);
    $ok = $stmt->execute([$userID, $orderID ]);
    

                        
    while($row = $stmt->fetch()){

        if( $row['photoID'] == NULL ){

            echo '{"status": 0,
                "paymentID": '.$row['paymentID'].',
                "ibanCode": "'.$row['ibanCode'].'",
                "price": '.$row['amountPaid'].',
                "payDate": "'.$row['payDate'].'"
            }';
            exit;

        }

        $photoFile = 'data:image/'. $row['format'] .' ;base64, '. base64_encode(  $row['photoFile'] ) ;

        echo '{"status": 1,
            "paymentID": '.$row['paymentID'].',
            "ibanCode": "'.$row['ibanCode'].'",
            "price": '.$row['amountPaid'].',
            "format": "'.$row['format'].'",
            "vDimensions": '.$row['vDimension'].',
            "hDimensions": '.$row['hDimension'].',
            "payDate": "'.$row['payDate'].'",
            "photoFile": "' .$photoFile .'"

            
        }';

    }



