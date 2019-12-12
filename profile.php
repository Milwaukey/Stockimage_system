<?php require_once(__DIR__ . '/header.php'); require_once(__DIR__ . '/includes/connection.php'); if(!$_SESSION){ header('Location: login.php '); } ?>





<div id="profile_section">

    <img class="profile_image" src="images/IMG_8538.jpg">
    <h1>Profile</h1>
    <hr>

        <?php if($_SESSION['type'] == 'photographer'){ 

            echo '<div>';
                        
                        $query = 'SELECT name, surname, email FROM tphotographers WHERE photographerID = ' .$_SESSION['ID'] .'';
                        $results = mysqli_query($db, $query);
                        while($row = mysqli_fetch_array($results)){

                            echo '<p>' . $row['name'] .'</p>';
                            echo '<p>' . $row['email'] .'</p>';

                            echo "
                                <div class='Update_personal_info hide'>
                                    <form>
                                    <div class='input_wrapper'>
                                        <label>Name</label>
                                        <input class='effect-1' name='tName' value='".$row['name']."'>
                                        <span class='focus-border'></span>
                                    </div>

                                    <div class='input_wrapper'>
                                        <label>Surname</label>
                                        <input class='effect-1' name='tSurname' value='".$row['surname']."'>
                                        <span class='focus-border'></span>
                                    </div>

                                    <div class='input_wrapper'>
                                        <label>Email</label>
                                        <input class='effect-1' name='tEmail' value='".$row['email']."'> 
                                        <span class='focus-border'></span>
                                    </div>                               
                                        <button>Update</button>
                                    </form>
                                </div>
                                ";
                            
                        }
                    
            echo '</div>';

            } ?>




            <?php if($_SESSION['type'] == 'user'){ 


            $query = 'SELECT name, surname, email, username, streetName, streetNumber, zipcode, tusers.cityID, cityName FROM tusers INNER JOIN tcities WHERE userID = '. $_SESSION['ID'] .' AND tcities.cityID = tusers.cityID; ';
            $results = mysqli_query($db, $query);


            $query2 = 'SELECT * FROM tcities';
            $results2 = mysqli_query($db, $query2);

            

            while($row = mysqli_fetch_array($results)){

                echo '<p>' . $row['username'] .'</p>';
                echo '<p>' . $row['name'] . ' ' . $row['surname'] .'</p>';


                echo "
                
                <div class='Update_personal_info hide'>
                    <form method='POST'>

                    <div class='input_wrapper'>
                        <label>Name</label>
                        <input class='effect-1' name='tName' value='".$row['name']."'>
                        <span class='focus-border'></span>
                    </div>

                    <div class='input_wrapper'>
                        <label>Surname</label>
                        <input class='effect-1' name='tSurname' value='".$row['surname']."'>
                        <span class='focus-border'></span>
                    </div>

                    <div class='input_wrapper'>
                    <label>Email</label>
                        <input class='effect-1' name='tEmail' value='".$row['email']."'>
                        <span class='focus-border'></span>
                    </div>


                    <div class='input_wrapper'>
                    <label>Email</label>
                        <input class='effect-1' name='tUsername' value='".$row['username']."'>
                        <span class='focus-border'></span>
                    </div>

                    <div class='wrapper_form'>
                    <div class='input_wrapper'>
                    <label>Streetname</label>
                        <input class='effect-1' name='tStreetName' value='".$row['streetName']."'>
                        <span class='focus-border'></span>
                    </div>

                    <div class='input_wrapper'>
                    <label>Streetnumber</label>
                        <input class='effect-1' name='tStreetNumber' value='".$row['streetNumber']."'>
                        <span class='focus-border'></span>
                    </div>
                    </div>

                    <div class='input_wrapper'>
                    <label>Zipcode</label>
                        <input class='effect-1' name='tZipcode' value='".$row['zipcode']."'>
                        <span class='focus-border'></span>
                        </div>


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


            }?>




        <div class="profile_buttons">
            <a href="APIs/api-delete-profile.php?ID=<?=$_SESSION['ID']?>"><div class="button_profile"><img class="icon" src="assets/icons/trash.svg">Delete</div></a>
            <div class="button_profile BtnUpdateImage"><img class="icon" src="assets/icons/edit.svg">Update</div>
        </div>

</div>



<div id="dashboard">
    hej
</div>




<!-- <div class="BtnUpdateImage">Update Profile</div> -->
<!-- <a href="APIs/api-delete-profile.php?ID=<?=$_SESSION['ID']?>">Delete Profile</a> -->


<?php $sLinkToScript = '<script src="js/update-profile.js"></script>'; require_once(__DIR__ . '/footer.php'); ?>
