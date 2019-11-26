<?php require_once(__DIR__ . '/header.php');

session_start();
if(!$_SESSION){

    header('Location: login.php ');

}

echo $_SESSION['type'];

?>



<h1>Gallery</h1>










<?php require_once(__DIR__ . '/footer.php'); ?>
