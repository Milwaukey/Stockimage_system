<?php

require_once(__DIR__ . '/../includes/connection.php'); 
require_once(__DIR__ . '/functions.php'); 



$tLogin = $_POST['tLogin'];
if( empty($tLogin) ){ sendResponse(0, 'You must write your login', __LINE__); }

$tPassword = $_POST['tPassword'];
if( empty($tPassword) ){ sendResponse(0, 'You must write your password', __LINE__); }


// CHECK IF tLogin is an email or an username
if( FILTER_VAR($tLogin, FILTER_VALIDATE_EMAIL) ){

    //THIS IS EXECUTION OF PDO - create the sequence to be prepared
    $query ='SELECT email, password, photographerID
    FROM tphotographers WHERE email = ?';
    $stmt = $db->prepare($query);
    $ok = $stmt->execute([$tLogin]);


    // If it doesn't exists the send response to the browser about wrong credentials 
    if( $ok == 0){
        
        echo sendResponse(0, 'Wrong Credentials!', __LINE__);
        
    }


    // IF TRUE  - loop trough the objecdt
    while($row = $stmt->fetch()){

        // CHECK THE PASSWORD 
        if( !password_verify( $tPassword, $row['password'] ) ){

            echo sendResponse(0, 'Wrong Credentials!', __LINE__);

        }



        $loginType = 'photographer';
        $loginID = $row['photographerID'] ;    


        session_start();
        $_SESSION['ID'] = $row['photographerID'];
        $_SESSION['type'] = $loginType;


        echo sendResponse(1, 'Correct Login!', __LINE__);

    }



}else {

    $query = "SELECT userID, email, username, active, password FROM tusers WHERE username = ? ";
    $stmt = $db->prepare($query);
    $ok = $stmt->execute([$tLogin]);

    // If it doesn't exists the send response to the browser about wrong credentials 
    if( $stmt->rowCount() == 0){

        echo sendResponse(0, 'Wrong Credentials!', __LINE__);

    }

     // IF TRUE  - loop trough the objecdt
     while($row = $stmt->fetch()){

        if( $row['active'] == 0){

            echo sendResponse(0, 'You are not active!', __LINE__);

        }

        // CHECK THE PASSWORD 
        if( !password_verify( $tPassword, $row['password'] ) ){

            echo sendResponse(0, 'Wrong Credentials!', __LINE__);

        }



        $loginType = 'user';
        $loginID = $row['userID'] ;    

        
        session_start();
        $_SESSION['ID'] = $row['userID'];
        $_SESSION['type'] = $loginType;


        echo sendResponse(1, 'Correct Login!', __LINE__);

    }

}

$db = null;