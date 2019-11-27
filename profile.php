<?php require_once(__DIR__ . '/header.php');

session_start();
if(!$_SESSION){

    header('Location: login.php ');

}

echo $_SESSION['type'];


?>



<h1>PROFILE</h1>

<a href="APIs/deleteuser.php?ID=<?=$_SESSION['ID']?>"

<?php require_once(__DIR__ . '/footer.php'); ?>
