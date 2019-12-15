<?php require_once(__DIR__ . '/header.php');
 require_once(__DIR__ . '/includes/connection.php'); ;

if(!$_SESSION){ header('Location: login.php '); }

if( $_SESSION['type'] != 'user' ){ header('Location: profile.php '); }?>



<!-- <?php if( $_SESSION['type'] == 'user' ){ ?> -->
<div class="add_new_card">
    <div class="cancel cancel_order_info"><img src="assets/icons/cancel.svg"></div>
    
<div class="download_container">

<?php 
    $query2 = 'SELECT tpayments.paymentID, tcards.ibanCode, tpayments.payDate, tpayments.amountPaid, format, hDimension, vDimension, photoFile FROM tpayments
    LEFT JOIN tcards ON tpayments.cardID = tcards.cardID LEFT JOIN tphotos ON tpayments.photoID = tphotos.photoID  WHERE userID = ? ORDER BY paymentID DESC LIMIT 1;';
    
    $stmt = $db->prepare($query2);
    $ok = $stmt->execute([$_SESSION['ID']]);
                        
    while($row = $stmt->fetch()){

        if( $row['photoFile'] == NULL ){


            echo ' 

            <img class="order_download_image" src="images/IMG_8538.jpg">
    
            <h2>Order #'.$row['paymentID'].'</h2>
            <hr>
    
            <div class="payment_info">
            <p><span>Card used:</span> '.$row['ibanCode'].'</p>
            <p><span>Price:</span> '.$row['amountPaid'].' DKK</p>
    
            <p><span>Paid at:</span> '. $row['payDate'] .'</p>
            </div>
                ';


        }else{

        echo ' 

        <img class="order_download_image" src="data:image/'. $row['format'] .';base64,'. base64_encode($row['photoFile']) .'">

        <h2>Order #'.$row['paymentID'].'</h2>
        <hr>

        <div class="payment_info">
        <p><span>Card used:</span> '.$row['ibanCode'].'</p>
        <p><span>Price:</span> '.$row['amountPaid'].' DKK</p>
        <p><span>Format:</span> '.$row['format'].'</p>
        <p><span>Dimensions:</span> '.$row['hDimension'].' x '.$row['vDimension'].'</p>

        <p><span>Paid at:</span> '. $row['payDate'] .'</p>
        </div>

        <a href="data:image/'. $row['format'] .';base64,'. base64_encode($row['photoFile']) .'" class="download_button" download>Download</a>
        ';
        }

    }
    
    ?>




</div>



</div>
<div class="card_container">

    <h1>Orders</h1>
    <hr>

    <div class="card_wrapper">

    <?php 
    $query = 'SELECT * FROM tpayments LEFT JOIN tcards ON tpayments.cardID = tcards.cardID  WHERE userID = ? ORDER BY paymentID DESC' ;
    
    $stmt = $db->prepare($query);
    $ok = $stmt->execute([$_SESSION['ID']]);
                        
    while($row = $stmt->fetch()){

        echo ' 
        <div class="order_card">
            <div></div>
            <div class="order_info">
                <p class="order_id">Order #'. $row['paymentID'] .'</p>
                <p class="view_order"> View order </p>
            </div>
        </div>
        ';

    }
    
    ?>

    </div>


</div>

<!-- <?php } ?> -->





<?php $sLinkToScript = '<script src="js/orders.js"></script>'; require_once(__DIR__ . '/footer.php'); ?>

