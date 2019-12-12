<?php require_once(__DIR__ . '/header.php'); 

// session_start();
if($_SESSION){

    header('Location: profile.php ');

}

?>


<div class="page_with_form_container">

<h1>Login</h1>
<hr>

<form>

    <div class="input_wrapper">
        <label>Username / Email</label>
        <input class="effect-1" name="tLogin" type="text" placeholder="Login">
        <span class="focus-border"></span>
    </div>

    <div class="input_wrapper">
        <label>Password</label>
        <input class="effect-1" name="tPassword" type="password" placeholder="Password">
        <span class="focus-border"></span>
    </div>

    <button id="BtnLogin">Login</button>
</form>

</div>


<?php $sLinkToScript = '<script src="js/login.js"></script>'; require_once(__DIR__ . '/footer.php'); ?>

