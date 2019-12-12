<?php require_once(__DIR__ . '/header.php'); 
require_once(__DIR__ . '/includes/connection.php'); 
if(!$_SESSION){ header('Location: login.php '); } if($_SESSION['type'] == 'photographer'){ header('Location: profile.php'); }
?>


<div class="btnOpenAddCard">ADD CARD</div>


<div class="add_new_card">

<div class="cancel card_cancel"><img src="assets/icons/cancel.svg"></div>

<form>      
    <div class="input_wrapper">
        <label>IBAN CODE</label>
        <input class="effect-1" name="tIbanCode" type="text" placeholder="ibanCode">
        <span class="focus-border"></span>
    </div>


    <div class="wrapper_form">
    <div class="input_wrapper">
        <label>Expiration date</label>
        <input class="effect-1" name="tExpirationDate" type="text" placeholder="tExpiration Date">
        <span class="focus-border"></span>
    </div>

    <div class="input_wrapper">
        <label>CCV</label>
        <input class="effect-1" name="tccv" type="text" placeholder="CCV">
        <span class="focus-border"></span>
    </div>
</div>


        <button id="BtnAddCard">Add card</button>
    </form>



</div>
<div class="card_container">

<h1>CARDS</h1>
<hr>

<div class="card_wrapper">

<?php 
            $query = 'SELECT ibanCode, expirationDate, ccv, totalAmountPaid FROM tcards WHERE userID = ?';

            $stmt = $db->prepare($query);
            $ok = $stmt->execute([$_SESSION['ID']]);

            while($row = $stmt->fetch()){

               
                echo '
                
                <div class="credit_card">
                    <div>
                        <img src="assets/icons/visa.svg">
                        <p> ' . $row['ibanCode'] . ' </p>
                        <span>
                            <p> ' . $row['expirationDate'] . '</p>
                            <p>' . $row['ccv'] . '</p>
                            </span>
                    </div>
                    <div>
                        <p>Amount Spend</p>
                        <p>' . $row['totalAmountPaid'] . ' DKK</p>
                    </div>
                </div>
                
                
                
                
                ';




            }
?>

</div>


</div>








    <?php $sLinkToScript = '<script src="js/add-card.js"></script>'; require_once(__DIR__ . '/footer.php'); ?>

</body>
</html>



