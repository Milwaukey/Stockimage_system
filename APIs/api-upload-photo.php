<?php 

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 

// CHANGE THIS BY GET
$galleryID = $_GET['galleryID'];



//Pickup files that have been uploaded // PHOTO ID // GALLERY ID // FORMAT // H + V // RESOLUTION // SIZE // PRICE // FILE  
$tPrice = $_POST['tPrice']; 
if( empty($tPrice) ){ sendResponse(0, 'txtPrice is empty', __LINE__); }
if( !ctype_digit( $tPrice ) ){ sendResponse(0, 'Not a number', __LINE__); }
if( $tPrice < 1 ){ sendResponse(0,'Must cost at least 1', __LINE__); }
if( $tPrice > 9999 ){ sendResponse(0, 'Cant cost more than 9999', __LINE__); }

// COUNTS the number op oploadeds images in the array
if( empty($_FILES['photos']['name']) ){ sendResponse(0, 'Must contain at least 1 image', __LINE__); };
$iNumberOfImages = count($_FILES['photos']['name']);


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
    $tmpFile = move_uploaded_file($_FILES['photos']['tmp_name'][$i], "/Applications/XAMPP/xamppfiles/htdocs/WebDevelopmentFrontend/images/" . $sImageName);    
    $path = '/Applications/XAMPP/xamppfiles/htdocs/WebDevelopmentFrontend/images/' . $sImageName;

    
    // Put it into the database // ONLY WORKS AS LOCAL HOST//ALSO MIGHT BE WEIRD WITH PREPARED STATEMENT
    $query = "

    INSERT INTO tphotos (galleryID, format, hDimension, vDimension, resolution, filesize, price, photoFile)
    VALUES (?, ?, ?, ?, ?, ?, ?, LOAD_FILE(?));

    ";

    $stmt = $db->prepare($query);
    $ok = $stmt->execute([$galleryID, $sExtension, $imageHeight, $imageWidth, $imageResolution, $iImageSize, $tPrice, $path ]) ;
    
}

// UPDATE THE GALLERY  with the number of  images added
$query2 = " SELECT numberOfPhotos FROM tgalleries WHERE galleryID = ?";
$stmt = $db->prepare($query2);
$ok = $stmt->execute([$galleryID]); 

while($row = $stmt->fetch()){

    $numberOfPhotos = $row['numberOfPhotos'];

    $newNumberOfPhotos = $numberOfPhotos+$iNumberOfImages;

    $query3 = " UPDATE tgalleries SET numberOfPhotos = ? WHERE galleryID = ?" ;
    $stmt = $db->prepare($query2);
    $ok = $stmt->execute([$newNumberOfPhotos,$galleryID]); 


}

$db = null;
echo sendResponse(1, 'Uploaded', __LINE__);
