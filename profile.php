<?php require_once(__DIR__ . '/header.php');

session_start();
if(!$_SESSION){

    header('Location: login.php ');

}

echo $_SESSION['type'];


?>



<h1>PROFILE</h1>

<p>Hej <?php echo $_SESSION['ID']; ?></p>

<a href="APIs/api-delete-profile.php?ID=<?=$_SESSION['ID']?>">Delete Profile</a>
<a href="APIs/api-logout.php?ID=<?=$_SESSION['ID']?>">Logout</a>

<?php require_once(__DIR__ . '/footer.php'); ?>
