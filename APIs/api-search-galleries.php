<?php

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 


session_start();

if(!$_SESSION){
 
    header('Location: ../login.php ');
    exit; // Make sure that code doesn't keeep running and deletes people!! 

}

$searchTerm1 = mysqli_real_escape_string($db,$_POST['gallery_name']);
$searchTerm2 = mysqli_real_escape_string($db,$_POST['photographer_name']);



// $query = "SELECT tgalleries.name, tgalleries.galleryID FROM tgalleries LEFT JOIN tphotographers ON tgalleries.photographerID = tphotographers.photographerID
// WHERE tgalleries.name LIKE '%$searchTerm1%'
// AND tphotographers.name LIKE '%$searchTerm2%';";



// $result = mysqli_query($db,$query);



$stmt = $db->prepare(
   "SELECT tgalleries.name, tgalleries.galleryID FROM tgalleries LEFT JOIN tphotographers ON tgalleries.photographerID = tphotographers.photographerID
WHERE tgalleries.name LIKE '%?%'
AND tphotographers.name LIKE '%?%';"
);

   
$stmt->bind_param("ss",$searchTerm1,$searchTerm2 );

$ok = $stmt->execute();


// If it doesn't exists the send response to the browser about wrong credentials 
if( $ok == 0){
    
    echo sendResponse(0, 'Wrong Credentials!', __LINE__);
    
}

// BELONGS TO THE STMT - DB - PREPARE - OK - BIND->PARAM PART 
$result = mysqli_stmt_get_result($stmt);



$contruct = '[';

while($row = mysqli_fetch_array($result)){

    
    $search_new_result = $row['name'];
    $search_id_gallery = $row['galleryID'];
    
    
    $contruct .= '{"id": '.$search_id_gallery.', "name": "'.$search_new_result.'"},';


}

$contruct = substr($contruct, 0, -1);
$contruct .= ']';


echo json_encode($contruct);
