<?php 

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 

// CHANGE THIS BY GET
$galleryID = 1;

//Pickup files that have been uploaded // PHOTO ID // GALLERY ID // FORMAT // H + V // RESOLUTION // SIZE // PRICE // FILE  
$tPrice = $_POST['tPrice'];

// COUNTS the number op oploadeds images in the array
$iNumberOfImages = count($_FILES['photos']['name']);

echo $iNumberOfImages;


// Loops though the number of oploades images, gives the possible to get path, size and so one for validation
for($i = 0; $i < $iNumberOfImages ; $i++){

    // NAME & SIZE 
    $sImageName = $_FILES['photos']['name'][$i];
    $iImageSize = $_FILES['photos']['size'][$i];
    
    // H + V demension
    $imageInformation = getimagesize($_FILES['photos']['tmp_name'][$i]);
    $imageWidth = $imageInformation[0];
    $imageHeight = $imageInformation[1];

    // IMAGE RESOLUTION 
    $imageResolution = $imageWidth .''. $imageHeight;

    // FORMAT / EXTENSION
    $sExtension = pathinfo( $_FILES['photos']['name'][$i] , PATHINFO_EXTENSION) ;
    $sExtension = strtolower($sExtension);

    $aAllowedExtensions = ['png', 'jpg', 'jpeg'];
    if( !in_array($sExtension, $aAllowedExtensions) ){
        sendResponse('0', 'Must be png, jpg, jpeg', __LINE__);
    }

    // FILE 
    $tmpFile = $_FILES['photos']['tmp_name'][$i];
    $tmpFile = $_FILES['photos']['tmp_name'][$i];

    
    // Removing images from the uploaded folder, to the one i want to store them in
    $tmpFile = move_uploaded_file($_FILES['photos']['tmp_name'][$i], "/Applications/XAMPP/xamppfiles/htdocs/WebDevelopmentDatabase/images/" . $sImageName);
    
    // echo $tmpFile;


    // Put it into the database // ONLY WORKS AS LOCAL HOST
    $query = "


    INSERT INTO tphotos (galleryID, format, hDimension, vDimension, resolution, filesize, price, photoFile)
    VALUES ($galleryID, '$sExtension', $imageHeight, $imageWidth, $imageResolution, $iImageSize, $tPrice, LOAD_FILE('/Applications/XAMPP/xamppfiles/htdocs/WebDevelopmentDatabase/images/$sImageName'));
    ";


    $results = mysqli_query($db, $query);

    // var_dump($results);

    // echo 'Image uploaded';
   
   
    // echo $i . 'hej';

}
