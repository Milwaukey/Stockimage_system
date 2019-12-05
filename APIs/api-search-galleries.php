<?php

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 


session_start();

if(!$_SESSION){

    header('Location: ../login.php ');
    exit; // Make sure that code doesn't keeep running and deletes people!! 

}
$searchTerm1 = $_POST['searchterm1'];
$searchTerm2 = $_POST['searchterm2'];

// $query = "SELECT photographerID FROM tphotographers WHERE name LIKE %$searchterm2%;"

$query = "SELECT name FROM tgalleries WHERE tgalleries.name LIKE %$searchterm1% AND WHERE tphotographer.name LIKE %$searchterm2% INNER JOIN tphotographers ON tgallieres.photographerID = tphotpgrapher.photographerID;";

$result = mysqli_query($db,$query);


echo sendResponse(1,'Search completed!',__LINE__);