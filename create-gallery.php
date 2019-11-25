<?php require_once(__DIR__ . '/header.php'); 
require_once(__DIR__ . '/includes/connection.php'); 


// HARD CODED SESSIONS ID FOR USER
$photographerID = 5;

?>

    <h1>Create gallery</h1>
    <form id="<?php echo $photographerID ?>">    
        <input name="tGalleryName" type="text" placeholder="Gallery Name">


        <button id="BtnCreateGallery">Create Gallery</button>
    </form>



    <?php $sLinkToScript = '<script src="js/create-gallery.js"></script>'; require_once(__DIR__ . '/footer.php'); ?>

</body>
</html>

