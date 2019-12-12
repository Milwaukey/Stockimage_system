<?php

/////////// CONNECTION TO THE DATABASE /////////////////

$host='localhost'; //Refers to the localhost, it matches depends on the server you use (like a domain server)
$user='root'; //Refers to the localhost, it matches depends on the server you use (like a domain server) 
$password=''; //Refers to the localhost, it matches depends on the server you use (like a domain server)
$databaseName = 'proofing_system_db';
$charset = 'utf8mb4';

// Prepared connection to the database 
$dsn = "mysql:host=$host;dbname=$databaseName;charset=$charset";

// 
$options = [
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES =>false,
];


// CREATE the connection to the database
try{
    // Create a PHP database object - Called PDO
    $db = new PDO($dsn,$user,$password,$options);



    // ERROR messages about what went wrong 
} catch (\PDOException $e){
    throw new \PDOException($e ->getMessage(),(int) $e->getCode());
}





// Closed because it's an included in other files, so if you don't close php it can cause errors!!
?>



