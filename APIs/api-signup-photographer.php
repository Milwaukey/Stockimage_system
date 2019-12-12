<?php 

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 

// INFORMATION FROM THE SIGNUP 

$tName = mysqli_real_escape_string($db,$_POST['tName']);
$tSurname = mysqli_real_escape_string($db,$_POST['tSurname']);
$tEmail = mysqli_real_escape_string($db,$_POST['tEmail']);

$writtenPassword = $_POST['tPassword'];
$tPassword = password_hash($writtenPassword, PASSWORD_DEFAULT);

// $query = "

// INSERT INTO tphotographers (name, surname, email, password)
// VALUES ('$tName', '$tSurname', '$tEmail', '$tPassword');

// ";


// $result = mysqli_query($db, $query);




$query =
    "INSERT INTO tphotographers (name, surname, email, password)
    VALUES (?, ?, ?, ?);"
;

$stmt = $db->prepare($query);
// execute the prepared statement
$ok = $stmt->execute([$tName,$tSurname, $tEmail,  $tPassword]);


// If it doesn't exists the send response to the browser about wrong credentials 
if( $ok == 0){
    
    echo sendResponse(0, 'Wrong Credentials!', __LINE__);
    
}



echo sendResponse('1', 'DONE', __LINE__);;

$db = null;