<?php 

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 


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

$writtenPassword = $_POST['tPassword'];
if( empty($writtenPassword) ){ sendResponse(0, 'You must write a password', __LINE__); }
if( strlen($writtenPassword) < 1 ){ sendResponse(0,'Must be more than 1 character', __LINE__); }
if( strlen($writtenPassword) > 50 ){ sendResponse(0, 'Must be max 50 characters', __LINE__); }
$tPassword = password_hash($writtenPassword, PASSWORD_DEFAULT);

$query =
    "INSERT INTO tphotographers (name, surname, email, password)
    VALUES (?, ?, ?, ?);"
;

$stmt = $db->prepare($query);
$ok = $stmt->execute([$tName,$tSurname, $tEmail,  $tPassword]);


echo sendResponse('1', 'DONE', __LINE__);;

$db = null;