<?php

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 


session_start();

if(!$_SESSION){
 
    header('Location: ../login.php ');
    exit; // Make sure that code doesn't keeep running and deletes people!! 

}
 
$searchTerm1 = '%'.$_POST['gallery_name'].'%';
$searchTerm2 = '%'.$_POST['photographer_name'].'%';


$query =
   "SELECT tgalleries.name, tgalleries.galleryID FROM tgalleries LEFT JOIN tphotographers ON tgalleries.photographerID = tphotographers.photographerID
    WHERE tgalleries.name LIKE ?
    AND tphotographers.name LIKE ?;"
;
    //prepare it
    $stmt = $db->prepare($query);
    // execute the prepared statement
    $ok = $stmt->execute([$searchTerm1,$searchTerm2]);


// If it doesn't exists the send response to the browser about wrong credentials 
if( $ok == 0){
    
    echo sendResponse(0, 'Wrong Credentials!', __LINE__);
    
}



$contruct = '[';

while($row = $stmt->fetch()){

    
    $search_new_result = $row['name'];
    $search_id_gallery = $row['galleryID'];
    
    
    $contruct .= '{"id": '.$search_id_gallery.', "name": "'.$search_new_result.'"},';


}

$contruct = substr($contruct, 0, -1);
$contruct .= ']';


echo json_encode($contruct);
$db = null;