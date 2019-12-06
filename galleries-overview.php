<?php require_once(__DIR__ . '/header.php'); 
require_once(__DIR__ . '/includes/connection.php'); 


session_start();
if(!$_SESSION){

    header('Location: login.php ');

}

echo $_SESSION['type'];


$photographerID = $_SESSION['ID'];

?>

<div <?php if($_SESSION['type'] == 'user'){echo 'class="hide"';} ?>>
    <h1>Create gallery</h1>


    <form id="<?php echo $photographerID ?>">    
        <input name="tGalleryName" type="text" placeholder="Gallery Name">
        <button id="BtnCreateGallery">Create Gallery</button>
    </form>


    <h1>Overview of MY galleries</h1>

    <?php 

        $query = 'SELECT galleryID, name FROM tgalleries WHERE photographerID =' . $_SESSION['ID'];

        $results = mysqli_query($db, $query);

        while($row = mysqli_fetch_array($results)){

            echo '<a href="gallery.php?id='. $row['galleryID'] .'"> '. $row['name'] .' </a>';

        }


    ?>
   
    
</div>
    
    <div <?php if($_SESSION['type'] == 'photographer'){echo 'class="hide"';} ?> >
    

    <h1>Overview ALL galleries (user)</h1>


<!-- SEARCH -->

    <form id="frmSearch">
        <input name="gallery_name" placeholder="Gallery Name">
        <input name="photographer_name" placeholder="Photographer Name">
        <button id="BtnSearch">SEARCH</button>
    </form>


    <div id="search_result"></div>

    <?php 

        $query = 'SELECT galleryID, name FROM tgalleries';

        $results = mysqli_query($db, $query);

        while($row = mysqli_fetch_array($results)){

            echo '<a href="gallery.php?id='. $row['galleryID'] .'"> '. $row['name'] .' </a>';
            
        }

    ?>
    

    </div>

    <?php $sLinkToScript2 ='<script src="js/search-galleries.js"></script>'; $sLinkToScript = '<script src="js/create-gallery.js"></script>'; require_once(__DIR__ . '/footer.php'); ?>

</body>
</html>

