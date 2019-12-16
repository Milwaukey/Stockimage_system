<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title></title>

    
</head>
<body>


<a href="index.php" class="logo">
    <img src="assets/logo.svg">
</a>

<nav>
    <a href="index.php"><img src="assets/logo.svg"></a>
    <hr>


    <?php if( !$_SESSION ){ echo '<a href="index.php" class="underline">Frontpage</a>'; }?>
    <?php if( !$_SESSION ){ echo '<a href="login.php" class="underline">Login</a>'; }?>
    <?php if( $_SESSION ){ echo '<a href="profile.php" class="underline">Profile</a>'; }?>
    <?php if( $_SESSION ){ echo '<a href="galleries-overview.php" class="underline">Galleries</a>'; }?>
    <?php if( $_SESSION && $_SESSION['type'] == 'user' ){ echo '<a href="add-card.php" class="underline">Cards</a>'; }?>

    <?php if( $_SESSION && $_SESSION['type'] == 'user' ){ echo '<a href="orders.php" class="underline">Orders</a>';}?>

    <?php if( !$_SESSION ){ echo '<a href="signup-user.php" class="underline">Signup User</a>';}?>
    <?php if( !$_SESSION ){ echo '<a href="signup-photographer.php" class="underline">Signup Photographer</a>';}?>
    <?php if( $_SESSION ){ echo '<a href="APIs/api-logout.php?ID=<?=' . $_SESSION['ID'] . '?>" class="underline">Logout</a>';}?>
</nav>

<div class="burger-menu burger-menu--closed" >
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
</div>



<section>