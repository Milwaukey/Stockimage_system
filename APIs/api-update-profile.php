<?php 
session_start();

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 


// CHECK IF ITS A PHOTOGRAPHER OR A USER THAT UPDATES THE INFORMATION 

$type = 'user';



if( $type == 'photographer' ){  // CHANGHE TO SESSION
    
    
    $tName = $_POST['tName']; 
    $tSurname = $_POST['tSurname']; 
    $tEmail = $_POST['tEmail']; 

    $writtenPassword = $_POST['tPassword'];
    $tPassword = password_hash($writtenPassword, PASSWORD_DEFAULT);

    $query = "UPDATE tphotographers SET name = '$tName', surname = '$tSurname', email = '$tEmail', password = '$tPassword' WHERE photographerID = " . $_SESSION['ID'] ;

    $results = mysqli_query($db, $query);

    echo sendResponse(1, "Message", __LINE__);

}





if( $type == 'user' ){ 


    $tName = $_POST['tName']; 
    $tSurname = $_POST['tSurname']; 
    $tEmail = $_POST['tEmail']; 
    
    $writtenPassword = $_POST['tPassword'];
    $tPassword = password_hash($writtenPassword, PASSWORD_DEFAULT);

    $tUsername = $_POST['tUsername'];
    $tStreetName = $_POST['tStreetName'];
    $tStreetNumber = $_POST['tStreetNumber'];
    $tZipcode= $_POST['tZipcode'];

    $query = "UPDATE tusers SET name = '$tName', surname = '$tSurname', email = '$tEmail', password = '$tPassword', username = '$tUsername', streetName = '$tStreetName', streetNumber = '$tStreetNumber', zipcode = $tZipcode WHERE userID = 4";

    $results = mysqli_query($db, $query);

    echo 'Done';

 }



