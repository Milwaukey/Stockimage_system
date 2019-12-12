<?php require_once(__DIR__ . '/header.php'); require_once(__DIR__ . '/includes/connection.php');  if(!$_SESSION){ header('Location: login.php '); } $photographerID = $_SESSION['ID']; ?>




<!-- <div class="button_profile"><img class="icon" src="assets/icons/create.svg"> Create Gallery</div> -->

<h1>Galleries</h1>
<hr>


<div <?php if($_SESSION['type'] == 'user'){echo 'class="hide"';} ?>>


<div id="CreateGalleryBox">
<div class="cancel"><img src="assets/icons/cancel.svg"></div>
<form id="<?php echo $photographerID ?>"> 

<div class="input_wrapper">
        <label>Gallery Name</label>
        <input class="effect-1" name="tGalleryName" type="text" placeholder="Write gallery name here ...">
        <span class="focus-border"></span>
</div> 
        <button id="BtnCreateGallery">Create Gallery</button>
</form>
</div>

<div class="gallery_grid_container">

<div class="createNewGallery"><img class="create_new_gallery_icon" src="assets/icons/plus.svg"></div>

<?php 

$query = 'SELECT galleryID, name FROM tgalleries WHERE photographerID =' . $_SESSION['ID'];

$results = mysqli_query($db, $query);

while($row = mysqli_fetch_array($results)){
    
    echo '
    
    <a href="gallery.php?id='. $row['galleryID'] .'">
    <div> 
    <div class="overlay">
                <p>'. $row['name'] .'</p>
                
            <div></div>
        </div>
        <img src="images/IMG_8538.jpg"> 
        </div>
    </a>
    ';
}


?>

</div>
</div>











    
    <div <?php if($_SESSION['type'] == 'photographer'){echo 'class="hide"';} ?> >

<!-- SEARCH -->

    <form id="frmSearch">
        <input name="gallery_name" placeholder="Gallery Name">
        <input name="photographer_name" placeholder="Photographer Name">
        <button id="BtnSearch">SEARCH</button>
    </form>


        <!-- <div id="search_result"> -->


                        <div id="search_result" class="gallery_grid_container">

                        <?php 

                        $query = 'SELECT galleryID, name FROM tgalleries';

                        $results = mysqli_query($db, $query);

                        while($row = mysqli_fetch_array($results)){
                            
                            echo '
                            
                            <a href="gallery.php?id='. $row['galleryID'] .'">
                            <div> 
                            <div class="overlay">
                                        <p>'. $row['name'] .'</p>
                                        
                                    <div></div>
                                </div>
                                <img src="images/IMG_8538.jpg"> 
                                </div>
                            </a>
                            ';
                        }


                        ?>

                        </div>
    
        </div>
    <!-- </div> -->

    <?php $sLinkToScript2 ='<script src="js/search-galleries.js"></script>'; $sLinkToScript = '<script src="js/create-gallery.js"></script>'; require_once(__DIR__ . '/footer.php'); ?>

</body>
</html>

