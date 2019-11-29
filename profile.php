<?php require_once(__DIR__ . '/header.php');
require_once(__DIR__ . '/includes/connection.php'); 

session_start();
if(!$_SESSION){

    header('Location: login.php ');

}

echo $_SESSION['type'];


?>



<h1>PROFILE</h1>


<div>

                <?php 
                $query = 'SELECT name, surname, email FROM tphotographers WHERE photographerID = ' .$_SESSION['ID'] .'';
                $results = mysqli_query($db, $query);
                while($row = mysqli_fetch_array($results)){

                    echo '<div>' . $row['name'] .'</div>';
                    echo '<div>' . $row['surname'] .'</div>';
                    echo '<div>' . $row['email'] .'</div>';
                    
                }
                ?>



</div>


<a href="APIs/api-delete-profile.php?ID=<?=$_SESSION['ID']?>">Delete Profile</a>
<a href="APIs/api-logout.php?ID=<?=$_SESSION['ID']?>">Logout</a>

<?php require_once(__DIR__ . '/footer.php'); ?>
