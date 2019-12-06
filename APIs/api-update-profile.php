<?php 
session_start();

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 



if( $_SESSION['type'] == 'photographer' ){ 
    
    $tName = mysqli_real_escape_string($db,$_POST['tName']); 
    $tSurname = mysqli_real_escape_string($db,$_POST['tSurname']); 
    $tEmail = mysqli_real_escape_string($db,$_POST['tEmail']); 

    // $writtenPassword = $_POST['tPassword'];
    // $tPassword = password_hash($writtenPassword, PASSWORD_DEFAULT);

    $query = "UPDATE tphotographers SET name = '$tName', surname = '$tSurname', email = '$tEmail' WHERE photographerID = " . $_SESSION['ID'] ;

    $results = mysqli_query($db, $query);

    echo sendResponse(1, "Done", __LINE__);

}





if( $_SESSION['type'] == 'user' ){ 

    $tName = mysqli_real_escape_string($db,$_POST['tName']); 
    $tSurname = mysqli_real_escape_string($db,$_POST['tSurname']); 
    $tEmail = mysqli_real_escape_string($db,$_POST['tEmail']); 
    
    // $writtenPassword = $_POST['tPassword'];
    // $tPassword = password_hash($writtenPassword, PASSWORD_DEFAULT);

    $tUsername = mysqli_real_escape_string($db,$_POST['tUsername']);
    $tStreetName = mysqli_real_escape_string($db,$_POST['tStreetName']);
    $tStreetNumber = mysqli_real_escape_string($db,$_POST['tStreetNumber']);
    $tZipcode= mysqli_real_escape_string($db,$_POST['tZipcode']);

    // ADD CITY CHANGE 
    $city = $_POST['tCity'];

    // $query = "UPDATE tusers SET name = '$tName', surname = '$tSurname', email = '$tEmail', username = '$tUsername', streetName = '$tStreetName', streetNumber = '$tStreetNumber', zipcode = $tZipcode, cityID = $city WHERE userID = " . $_SESSION['ID'] ;

    // mysqli_query($db, $query);

    // NEW PREPARED VERSION
    
    $stmt = $db->prepare(
        "UPDATE tusers SET name = ?, surname = ?, email = ?, username = ?, streetName = ?,
         streetNumber = ?, zipcode = ?, cityID = ? 
         WHERE userID =  ?"
   );
   
       
    $stmt->bind_param("ssssssss", $tName,$tSurname,$tEmail,$tUsername,$tStreetName,$tStreetNumber,$tZipcode,$city ,$_SESSION['ID'] );
   
    $ok = $stmt->execute();
   
   
    // If it doesn't exists the send response to the browser about wrong credentials 
    if( $ok == 0){
        
        echo sendResponse(0, 'Wrong Credentials!', __LINE__);
        
    }
    
    // BELONGS TO THE STMT - DB - PREPARE - OK - BIND->PARAM PART 
    $results = mysqli_stmt_get_result($stmt);

    echo sendResponse(1, "Done", __LINE__);

 }



