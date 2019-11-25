<?php

/////////// CONNECTION TO THE DATABASE /////////////////

$host='localhost'; //Refers to the localhost, it matches depends on the server you use (like a domain server)
$user='root'; //Refers to the localhost, it matches depends on the server you use (like a domain server) 
$password=''; //Refers to the localhost, it matches depends on the server you use (like a domain server)
$databaseName = 'proofing_system_db';

$db = mysqli_connect($host, $user, $password, $databaseName); // Establish the connection to the server by using the information from the variables 

mysqli_set_charset($db, 'utf8'); // Uses the UTF8 charset that's also used in the database

// Build in mysql about errors, so it can give us the right error
if( $db->connect_error){
    die('Connection Failed: ' . $db->connect_error);
}

// echo 'connected';

// Closed because it's an included in other files, so if you don't close php it can cause errors!!
?>



