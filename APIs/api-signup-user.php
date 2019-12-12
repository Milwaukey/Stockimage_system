<?php 

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 

// INFORMATION FROM THE SIGNUP 

$tName = $_POST['tName'];
$tSurname = $_POST['tSurname'];
$tEmail = $_POST['tEmail'];
$tUsername = $_POST['tUsername'];

$writtenPassword = $_POST['tPassword'];
$tPassword = password_hash($writtenPassword, PASSWORD_DEFAULT);

$tStreetName = $_POST['tStreetName'];
$tStreetNumber = $_POST['tStreetNumber'];
$tZipcode = $_POST['tZipcode'];
$tCity = $_POST['tCity'];


// $signupDate = date('Y-m-d', time() );
$signupDate = date('Y-m-d', time() );

// $query = "

// INSERT INTO tusers (name, surname, email, username, password, streetName, streetNumber, zipcode, cityID, signupDate )
// VALUES ('$tName', '$tSurname', '$tEmail', '$tUsername' , '$tPassword', '$tStreetName', '$tStreetNumber', '$tZipcode', $tCity, DATE '$signupDate' );

// ";


// mysqli_query($db, $query);




$query =
    "INSERT INTO tusers (name, surname, email, username, password, streetName, streetNumber, zipcode, cityID, signupDate )
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ? DATE ? )"
;

$stmt = $db->prepare($query);
// execute the prepared statement
$ok = $stmt->execute([$tName, $tSurname, $tEmail, $tUsername , $tPassword, $tStreetName, $tStreetNumber,$tZipcode, $tCity, $signupDate]);


// If it doesn't exists the send response to the browser about wrong credentials 
if( $ok == 0){
    
    echo sendResponse(0, 'Wrong Credentials!', __LINE__);
    
}

echo sendResponse('1', 'DONE', __LINE__);

$db = null;