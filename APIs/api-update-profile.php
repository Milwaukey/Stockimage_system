<?php 
session_start();

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 



if( $_SESSION['type'] == 'photographer' ){ 
    
    $tName = $_POST['tName']; 
    $tSurname = $_POST['tSurname']; 
    $tEmail = $_POST['tEmail']; 


    $query = 'UPDATE tphotographers SET name = ?, surname = ?, email = ? WHERE photographerID = ?';

    $stmt = $db->prepare($query);
    // execute the prepared statement
    $ok = $stmt->execute([$tName, $tSurname, $tEmail, $_SESSION['ID'] ]);
    

    echo sendResponse(1, "Done", __LINE__);

}





if( $_SESSION['type'] == 'user' ){ 

    $tName = $_POST['tName']; 
    $tSurname = $_POST['tSurname']; 
    $tEmail = $_POST['tEmail']; 

    $tUsername = $_POST['tUsername'];
    $tStreetName = $_POST['tStreetName'];
    $tStreetNumber = $_POST['tStreetNumber'];
    $tZipcode= $_POST['tZipcode'];

    // ADD CITY CHANGE 
    $city = $_POST['tCity'];
    
    $query =
        'UPDATE tusers SET name = ?, surname = ?, email = ?, username = ?, streetName = ?,
         streetNumber = ?, zipcode = ?, cityID = ? 
         WHERE userID =  ?';
   
 
    $stmt = $db->prepare($query);
    $ok = $stmt->execute([$tName,$tSurname,$tEmail,$tUsername,$tStreetName,$tStreetNumber,$tZipcode,$city ,$_SESSION['ID'] ]);
   
   
    // If it doesn't exists the send response to the browser about wrong credentials 
    if( $ok == 0){
        
        echo sendResponse(0, 'Wrong Credentials!', __LINE__);
        
    }
    

    echo sendResponse(1, "Done", __LINE__);

 }


 $db = null;
