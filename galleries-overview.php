<?php require_once(__DIR__ . '/header.php'); 
require_once(__DIR__ . '/includes/connection.php'); 


session_start();
if(!$_SESSION){

    header('Location: login.php ');

}

echo $_SESSION['type'];

// HARD CODED SESSIONS ID FOR USER
$photographerID = 5;

?>

<div <?php if($_SESSION['type'] == 'user'){echo 'class="hide"';} ?>>
    <h1>Create gallery</h1>
    <form id="<?php echo $photographerID ?>">    
        <input name="tGalleryName" type="text" placeholder="Gallery Name">


        


        <button id="BtnCreateGallery">Create Gallery</button>
    </form>


    <h1>Overview ALL galleries (photographer)</h1>
   
    
</div>
    
    <div <?php if($_SESSION['type'] == 'photographer'){echo 'class="hide"';} ?>>
    <h1>Overview ALL galleries (user)</h1>
    </div>

    <?php $sLinkToScript = '<script src="js/create-gallery.js"></script>'; require_once(__DIR__ . '/footer.php'); ?>

</body>
</html>

