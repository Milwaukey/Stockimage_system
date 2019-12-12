<?php require_once(__DIR__ . '/header.php');

// session_start();
if($_SESSION){

    header('Location: profile.php ');

}

?>

<div class="signup_form_container">


    <h1>Signup Photographer</h1>
    <form>
        <div class="input_wrapper">
            <label>Name</label>
            <input class="effect-1" name="tName" type="text" placeholder="Name">
            <span class="focus-border"></span>
        </div>
        <div class="input_wrapper">
            <label>Surname</label>
            <input class="effect-1" name="tSurname" type="text" placeholder="Surname">
            <span class="focus-border"></span>
        </div>
        <div class="input_wrapper">
            <label>Email</label>
            <input class="effect-1" name="tEmail" type="text" placeholder="Email">
            <span class="focus-border"></span>
        </div>
        <div class="input_wrapper">
            <label>Password</label>
            <input class="effect-1" name="tPassword" type="text" placeholder="Password">
            <span class="focus-border"></span>
        </div>

        <button id="BtnSignup">Signup</button>
    </form>


</div>

    <?php $sLinkToScript = '<script src="js/signup-photographer.js"></script>'; require_once(__DIR__ . '/footer.php'); ?>

</body>
</html>


