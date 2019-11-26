<?php require_once(__DIR__ . '/header.php'); 

session_start();
if($_SESSION){

    header('Location: profile.php ');

}

?>



<h1>Login</h1>

<form>
    <input name="tLogin" type="text" placeholder="Login">
    <input name="tPassword" type="password" placeholder="Password">
    <button id="BtnLogin">Login</button>
</form>


<?php $sLinkToScript = '<script src="js/login.js"></script>'; require_once(__DIR__ . '/footer.php'); ?>
