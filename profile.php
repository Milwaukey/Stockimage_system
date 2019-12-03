<?php require_once(__DIR__ . '/header.php');
require_once(__DIR__ . '/includes/connection.php'); 

session_start();
if(!$_SESSION){

    header('Location: login.php ');

}

echo $_SESSION['type'];


?>



<h1>PROFILE</h1>


<?php if($_SESSION['type'] == 'photographer'){ 

    echo '<div>';
                
                $query = 'SELECT name, surname, email FROM tphotographers WHERE photographerID = ' .$_SESSION['ID'] .'';
                $results = mysqli_query($db, $query);
                while($row = mysqli_fetch_array($results)){

                    echo '<div>' . $row['name'] .'</div>';
                    echo '<div>' . $_SESSION['ID'] .'</div>';
                    echo '<div>' . $row['surname'] .'</div>';
                    echo '<div>' . $row['email'] .'</div>';

                    echo "
                        <div class='Update_personal_info hide'>
                            <form>
                                <input name='tName' value='".$row['name']."'>
                                <input name='tSurname' value='".$row['surname']."'>
                                <input name='tEmail' value='".$row['email']."'>                                
                                <button>Update</button>
                            </form>
                        </div>
                        ";
                    
                }
            
    echo '</div>';


 } ?>







<?php if($_SESSION['type'] == 'user'){ 


// SELECT * FROM tbook INNER JOIN tbooktheme ON tbook.nBookID = tbooktheme.nBookID INNER JOIN ttheme ON tbooktheme.nThemeID = ttheme.nThemeID WHERE nPublishingCompanyID = 32;

// SELECT name, surname, email, username, streetName, streetNumber, tcities.cityID, cityName FROM tusers INNER JOIN tcities WHERE userID = 1;




    echo '<div>';
            
            $query = 'SELECT name, surname, email, username, streetName, streetNumber, zipcode, tusers.cityID, cityName FROM tusers INNER JOIN tcities WHERE userID = '. $_SESSION['ID'] .' AND tcities.cityID = tusers.cityID; ';
            $results = mysqli_query($db, $query);


            $query2 = 'SELECT * FROM tcities';
            $results2 = mysqli_query($db, $query2);

            

            while($row = mysqli_fetch_array($results)){

                echo  '<div>' .$row['name'] . '</div>';
                echo '<div>' . $_SESSION['ID'] .'</div>';

                echo "
                
                <div class='Update_personal_info hide'>
                    <form method='POST'>
                        <input name='tName' value='".$row['name']."'>
                        <input name='tSurname' value='".$row['surname']."'>
                        <input name='tEmail' value='".$row['email']."'>
                        <input name='tUsername' value='".$row['username']."'>
                        <input name='tStreetName' value='".$row['streetName']."'>
                        <input name='tStreetNumber' value='".$row['streetNumber']."'>
                        <input name='tZipcode' value='".$row['zipcode']."'>
                        <select name='tCity'>
                            <option value='". $row['cityID'] ."'>" . $row['cityName'] ."</option> ";

                            
                            while($row2 = mysqli_fetch_array($results2)) {

                                echo '<option value="'. $row2['cityID'] . '">' . $row2['cityName'] . '</option>';//sloppy use jquery 
            
                            }

                        echo "</select>
                        <button type='submit'>Update</button>
                    </form>
                </div>
                ";
                
            }
        
    echo '</div>';

} ?>




<div class="BtnUpdateImage">Update Profile</div>
<a href="APIs/api-delete-profile.php?ID=<?=$_SESSION['ID']?>">Delete Profile</a>
<a href="APIs/api-logout.php?ID=<?=$_SESSION['ID']?>">Logout</a>

<?php $sLinkToScript = '<script src="js/update-profile.js"></script>'; require_once(__DIR__ . '/footer.php'); ?>
