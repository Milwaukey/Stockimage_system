<?php 

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 

// INFORMATION FROM THE SIGNUP 

$tName = $_POST['tName'];
$tSurname = $_POST['tSurname'];
$tEmail = $_POST['tEmail'];
$tPassword = hash('md5', $_POST['tPassword']);

$query = "

INSERT INTO tphotographers (name, surname, email, password)
VALUES ('$tName', '$tSurname', '$tEmail', '$tPassword');

";


$result = mysqli_query($db, $query);

echo sendResponse('1', 'DONE', __LINE__);;

