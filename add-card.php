<?php require_once(__DIR__ . '/header.php'); 
require_once(__DIR__ . '/includes/connection.php'); 

session_start();
if(!$_SESSION){

    header('Location: login.php ');

}

if($_SESSION['type'] == 'photographer'){

    header('Location: profile.php');

}

// HARD CODED SESSIONS ID FOR USER
$userID = 3;

?>

    <h1>Add card</h1>
    <form id="<?php echo $userID ?>">    
        <input name="tIbanCode" type="text" placeholder="ibanCode">
        <input name="tExpirationDate" type="text" placeholder="tExpiration Date">
        <input name="tccv" type="text" placeholder="CCV">


        <button id="BtnAddCard">Add card</button>
    </form>



    <?php $sLinkToScript = '<script src="js/add-card.js"></script>'; require_once(__DIR__ . '/footer.php'); ?>

</body>
</html>

