<?php require_once(__DIR__ . '/header.php'); ?>

    <h1>Signup Photographer</h1>
    <form>
        <input name="tName" type="text" placeholder="Name">
        <input name="tSurname" type="text" placeholder="Surname">
        <input name="tEmail" type="text" placeholder="Email">
        <input name="tPassword" type="text" placeholder="Password">
        <button id="BtnSignup">Signup</button>
    </form>




    <?php $sLinkToScript = '<script src="js/signup-photographer.js"></script>'; require_once(__DIR__ . '/footer.php'); ?>

</body>
</html>


