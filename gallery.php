<?php require_once(__DIR__ . '/header.php');
 require_once(__DIR__ . '/includes/connection.php'); ;

if(!$_SESSION){ header('Location: login.php '); } if(empty($_GET['id'])){ header('Location: galleries-overview.php'); } $galleryID = $_GET['id'];
?>


<div id="profile_section">


    <img class="profile_image" src="images/IMG_8538.jpg">

    <?php 

    $query_galleries = 'SELECT tgalleries.name AS galleryName, tphotographers.name, surname FROM tgalleries LEFT JOIN tphotographers ON tphotographers.photographerID = tgalleries.photographerID WHERE galleryID = '. $_GET['id'] .'';

    $results_galleries_info = mysqli_query($db, $query_galleries);

    while($row = mysqli_fetch_array($results_galleries_info)){

        echo '<h1>'. $row['galleryName'] .'</h1>';
        echo '<p></p>';
        echo '<p>'. $row['name'] .' ' . $row['surname'] .'</p>';

    }
    ?>

    <hr>

    <?php if($_SESSION['type'] == 'photographer'){ ?>
    
    <div class="profile_buttons">
        <a class="button_profile" href="APIs/api-delete-gallery.php?id=<?php echo $galleryID ?>" class="BtnDeleteGallery"><img class="icon" src="assets/icons/trash.svg">Delete</a>
        <div id="BtnUpload_images" class="button_profile"><img class="icon" src="assets/icons/upload.svg"> Upload</div>
    </div>

    <form id="<?php echo $_GET['id'] ?>" class="frmUploadImages hide">
        <input id="imageUpload" name="photos[]" type="file" multiple="multipart/form-data" required>
        <input name="tPrice" type="number" min="0" step="any" placeholder="Image price" required>
        <button>Upload</button>
    </form>
    

    
    <?php }; ?>




    <div id="select_card" class="hide">

    <div class="cart_section">
        <p class="photo_buy"></p>
        <p class="price_buy_image"></p>
    </div>

        <select>
        <option disabled selected >CHOOSE CARD</option>
                <?php 
                $query = 'SELECT cardID, ibanCode FROM tcards WHERE userID = ' .$_SESSION['ID'] .'';
                $results = mysqli_query($db, $query);
                while($row = mysqli_fetch_array($results)){

                    echo '<option value=" '. $row['cardID'] .' "> '. $row['ibanCode'] .' </option>';
                    
                }
                ?>
        </select>

    </div>




    </div>




    <div id="dashboard">
    
            <div class="gallery_singleview_container">
            <?php 

            $query = 'SELECT photoID, price, photoFile, format FROM tphotos WHERE galleryID = '. $_GET['id'] .'';

            $results = mysqli_query($db, $query);

            while($row = mysqli_fetch_array($results)){

                echo '<div id="photo_' . $row['photoID'] . '" class="single_image_box">';
                        echo '<div class="resize"><img src="assets/icons/resize.svg"></div>';
                        echo '<div class="price photo_price_'.$row['photoID'].'"> ' .$row['price'] . '</div>';
                        echo '<img src="data:image/'. $row['format'] .';base64,'. base64_encode($row['photoFile']) .'">';
                        if($_SESSION['type'] == 'user'){ echo '<div class="BtnBuyImage" id="'. $row['photoID'] .'"><img src="assets/icons/cart.svg"></div>'; };
                        if($_SESSION['type'] == 'photographer'){ echo '<div class="BtnDeleteImage" id="'. $row['photoID'] .'"><img src="assets/icons/trash.svg"></div>'; };

                echo '</div>';


            }


            ?>
            </div>

















<?php

$sLinkToScript4 = '<script src="js/upload-images.js"></script>';
$sLinkToScript3 = '<script src="js/delete-image.js"></script>';
$sLinkToScript = '<script src="js/create-payment.js"></script>';


require_once(__DIR__ . '/footer.php'); ?>

