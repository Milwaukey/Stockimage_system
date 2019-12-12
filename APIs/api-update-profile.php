<?php 
session_start();

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 


if( $_SESSION['type'] == 'photographer' ){ 
    

    $tName = $_POST['tName']; 
    if( empty($tName) ){ sendResponse(0, 'You must write a name', __LINE__); }
    if( strlen($tName) < 1 ){ sendResponse(0,'Must be more than 1 character', __LINE__); }
    if( strlen($tName) > 50 ){ sendResponse(0, 'Must be max 50 characters', __LINE__); }


    $tSurname = $_POST['tSurname'];
    if( empty($tSurname) ){ sendResponse(0, 'You must write a surname', __LINE__); }
    if( strlen($tSurname) < 1 ){ sendResponse(0,'Must be more than 1 character', __LINE__); }
    if( strlen($tSurname) > 60 ){ sendResponse(0, 'Must be max 60 characters', __LINE__); }
    
    
    $tEmail = $_POST['tEmail']; 
    if( empty($tEmail) ){ sendResponse(0, 'You must write an email', __LINE__); }
    if (!filter_var($tEmail, FILTER_VALIDATE_EMAIL)) { sendResponse(0, 'Not a valid email', __LINE__); }


    $query = 'UPDATE tphotographers SET name = ?, surname = ?, email = ? WHERE photographerID = ?';

    $stmt = $db->prepare($query);
    $ok = $stmt->execute([$tName, $tSurname, $tEmail, $_SESSION['ID'] ]);
    

    echo sendResponse(1, "Done", __LINE__);

}





if( $_SESSION['type'] == 'user' ){ 

    $tName = $_POST['tName']; 
    if( empty($tName) ){ sendResponse(0, 'You must write a name', __LINE__); }
    if( strlen($tName) < 1 ){ sendResponse(0,'Must be more than 1 character', __LINE__); }
    if( strlen($tName) > 50 ){ sendResponse(0, 'Must be max 50 characters', __LINE__); }

    $tSurname = $_POST['tSurname']; 
    if( empty($tSurname) ){ sendResponse(0, 'You must write a surname', __LINE__); }
    if( strlen($tSurname) < 1 ){ sendResponse(0,'Must be more than 1 character', __LINE__); }
    if( strlen($tSurname) > 60 ){ sendResponse(0, 'Must be max 60 characters', __LINE__); }

    $tEmail = $_POST['tEmail']; 
    if( empty($tEmail) ){ sendResponse(0, 'You must write an email', __LINE__); }
    if (!filter_var($tEmail, FILTER_VALIDATE_EMAIL)) { sendResponse(0, 'Not a valid email', __LINE__); }

    $tUsername = $_POST['tUsername'];
    if( empty($tUsername) ){ sendResponse(0, 'You must write a username', __LINE__); }
    if( strlen($tUsername) < 1 ){ sendResponse(0,'Must be more than 1 character', __LINE__); }
    if( strlen($tUsername) > 50 ){ sendResponse(0, 'Must be max 50 characters', __LINE__); }

    $tStreetName = $_POST['tStreetName'];
    if( empty($tStreetName) ){ sendResponse(0, 'You must write a streetname', __LINE__); }
    if( strlen($tStreetName) < 1 ){ sendResponse(0,'Must be at least 1 character', __LINE__); }
    if( strlen($tStreetName) > 50 ){ sendResponse(0, 'Must be max 50 characters', __LINE__); }

    $tStreetNumber = $_POST['tStreetNumber'];
    if( empty($tStreetNumber) ){ sendResponse(0, 'You must write a streetnumber', __LINE__); }
    if( strlen($tStreetNumber) < 1 ){ sendResponse(0,'Must be at least than 1 character', __LINE__); }
    if( strlen($tStreetNumber) > 5 ){ sendResponse(0, 'Must be max 5 characters', __LINE__); }

    $tZipcode= $_POST['tZipcode'];
    if( empty($tZipcode) ){ sendResponse(0, 'You must write a street', __LINE__); }
    if( !ctype_digit( $tZipcode ) ){ sendResponse(0, 'Not a number', __LINE__); }
    if( strlen($tZipcode) < 1 ){ sendResponse(0,'Must be exactly 4 digits', __LINE__); }
    if( strlen($tZipcode) > 5 ){ sendResponse(0, 'Must be exactly 4 digits', __LINE__); }

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
