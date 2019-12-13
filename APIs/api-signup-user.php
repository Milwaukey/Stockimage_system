<?php 

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 

// INFORMATION FROM THE SIGNUP 

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


// write the sequence for the database
$checkUsernameExist = "SELECT username FROM tusers WHERE username = ?";

//prepare it
$stmt = $db->prepare($checkUsernameExist);

// execute the prepared statement
$ok = $stmt->execute([$tUsername]);
if($ok == true ){
    sendResponse(0 ,'Username already exist in the system', __LINE__);
}



$writtenPassword = $_POST['tPassword'];
if( empty($writtenPassword) ){ sendResponse(0, 'You must write a password', __LINE__); }
if( strlen($writtenPassword) < 1 ){ sendResponse(0,'Must be more than 1 character', __LINE__); }
if( strlen($writtenPassword) > 50 ){ sendResponse(0, 'Must be max 50 characters', __LINE__); }
$tPassword = password_hash($writtenPassword, PASSWORD_DEFAULT);

$tStreetName = $_POST['tStreetName'];
if( empty($tStreetName) ){ sendResponse(0, 'You must write a streetname', __LINE__); }
if( strlen($tStreetName) < 1 ){ sendResponse(0,'Must be at least 1 character', __LINE__); }
if( strlen($tStreetName) > 50 ){ sendResponse(0, 'Must be max 50 characters', __LINE__); }

$tStreetNumber = $_POST['tStreetNumber'];
if( empty($tStreetNumber) ){ sendResponse(0, 'You must write a streetnumber', __LINE__); }
if( strlen($tStreetNumber) < 1 ){ sendResponse(0,'Must be at least than 1 character', __LINE__); }
if( strlen($tStreetNumber) > 5 ){ sendResponse(0, 'Must be max 5 characters', __LINE__); }

$tZipcode = $_POST['tZipcode'];
if( empty($tZipcode) ){ sendResponse(0, 'You must write a street', __LINE__); }
if( !ctype_digit( $tZipcode ) ){ sendResponse(0, 'Not a number', __LINE__); }
if( strlen($tZipcode) < 1 ){ sendResponse(0,'Must be exactly 4 digits', __LINE__); }
if( strlen($tZipcode) > 5 ){ sendResponse(0, 'Must be exactly 4 digits', __LINE__); }

$tCity = $_POST['tCity'];

$signupDate = date('Y-m-d', time() );


$query =
    "INSERT INTO tusers (name, surname, email, username, password, streetName, streetNumber, zipcode, cityID, signupDate )
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ? DATE ? )"
;

$stmt = $db->prepare($query);
$ok = $stmt->execute([$tName, $tSurname, $tEmail, $tUsername , $tPassword, $tStreetName, $tStreetNumber,$tZipcode, $tCity, $signupDate]);



$db = null;
echo sendResponse('1', 'DONE', __LINE__);
