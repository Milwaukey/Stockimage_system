<?php require_once(__DIR__ . '/header.php'); require_once(__DIR__ . '/includes/connection.php');  if(!$_SESSION){ header('Location: login.php '); } $photographerID = $_SESSION['ID']; ?>



<h1>Galleries</h1>
<hr>


<?php if($_SESSION['type'] == 'photographer'){ ?>


<div id="<?php echo $_SESSION['ID'] ?>" class="gallery_grid_container">

<div class="createNewGallery"><img class="create_new_gallery_icon" src="assets/icons/plus.svg"></div>

<?php 

    $query = 'SELECT galleryID, name FROM tgalleries WHERE photographerID = ?';

    $stmt = $db->prepare($query);
    $ok = $stmt->execute([$_SESSION['ID']]);

    while($row = $stmt->fetch()){
        
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


<?php }?>








    
<?php if($_SESSION['type'] == 'user'){ ?> 

<!-- SEARCH -->

    <form id="frmSearch">
        <div class="searchWrapper">
        <div id="BtnSearch"></div>
            <input name="gallery_name" class="searcher" placeholder="Gallery">
            <input name="photographer_name" class="searcher" placeholder="Photographer">
        </div>
            <!-- <button id="BtnSearch">SEARCH</button> -->
        
    </form>


        <!-- <div id="search_result"> -->


                        <div id="search_result" class="gallery_grid_container">

                        <?php 

                        $query = 'SELECT galleryID, name FROM tgalleries';

                        $stmt = $db->prepare($query);
                        $ok = $stmt->execute();

                        while($row = $stmt->fetch()){
                            
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
    
<?php } ?>

    <?php $sLinkToScript2 ='<script src="js/search-galleries.js"></script>'; $sLinkToScript = '<script src="js/create-gallery.js"></script>'; require_once(__DIR__ . '/footer.php'); ?>

</body>
</html>

