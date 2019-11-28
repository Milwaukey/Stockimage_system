<?php 


session_start();
require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 


$query = "SELECT cardID, ibanCode FROM tcards WHERE userID = ". $_SESSION['ID'] . "";

$results = mysqli_query($db, $query);


$contruct = '{';
$i='c' . 1;
while($row = mysqli_fetch_array($results)){

$contruct .= '"' . $i . '":';

    $contruct .= '{
        "ibanCode": "'. $row['ibanCode'] .'",
        "cardID": '. $row['cardID'] .'
    },';

    
    $i++;

};


$contruct = substr($contruct, 0, -1);
$contruct .= '}';


echo $contruct;