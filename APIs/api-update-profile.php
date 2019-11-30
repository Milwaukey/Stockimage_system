<?php 
session_start();

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 



if( $_SESSION['type'] == 'photographer' ){ 
    
    $tName = $_POST['tName']; 
    $tSurname = $_POST['tSurname']; 
    $tEmail = $_POST['tEmail']; 

    // $writtenPassword = $_POST['tPassword'];
    // $tPassword = password_hash($writtenPassword, PASSWORD_DEFAULT);

    $query = "UPDATE tphotographers SET name = '$tName', surname = '$tSurname', email = '$tEmail' WHERE photographerID = " . $_SESSION['ID'] ;

    $results = mysqli_query($db, $query);

    echo sendResponse(1, "Done", __LINE__);

}





if( $_SESSION['type'] == 'user' ){ 

    $tName = $_POST['tName']; 
    $tSurname = $_POST['tSurname']; 
    $tEmail = $_POST['tEmail']; 
    
    // $writtenPassword = $_POST['tPassword'];
    // $tPassword = password_hash($writtenPassword, PASSWORD_DEFAULT);

    $tUsername = $_POST['tUsername'];
    $tStreetName = $_POST['tStreetName'];
    $tStreetNumber = $_POST['tStreetNumber'];
    $tZipcode= $_POST['tZipcode'];

    // ADD CITY CHANGE 
    $city = $_POST['tCity'];

    $query = "UPDATE tusers SET name = '$tName', surname = '$tSurname', email = '$tEmail', username = '$tUsername', streetName = '$tStreetName', streetNumber = '$tStreetNumber', zipcode = $tZipcode, cityID = $city WHERE userID = " . $_SESSION['ID'] ;

    $results = mysqli_query($db, $query);

    echo sendResponse(1, "Done", __LINE__);

 }



