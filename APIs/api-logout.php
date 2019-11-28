<?php 

    require_once(__DIR__ . '/../includes/connection.php'); 
    require_once(__DIR__ . '/functions.php'); 

    session_start();



    if(!$_SESSION){

        header('Location: ../login.php ');
        exit; // Make sure that code doesn't keeep running and deletes people!! 

    }




    session_destroy();

    
    header('Location: ../login.php');