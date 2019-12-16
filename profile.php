<?php require_once(__DIR__ . '/header.php'); require_once(__DIR__ . '/includes/connection.php'); if(!$_SESSION){ header('Location: login.php '); } ?>





<div id="profile_section">

    <img class="profile_image" src="images/IMG_8538.jpg">
    <h1>Profile</h1>
    <hr>

        <?php if($_SESSION['type'] == 'photographer'){ 

            echo '<div>';

                $query = 'SELECT name, surname, email FROM tphotographers WHERE photographerID = ?';

                //prepare it
                $stmt = $db->prepare($query);

                // execute the prepared statement
                $ok = $stmt->execute([$_SESSION['ID']]);

                        while($row = $stmt->fetch()){

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
                                        <button class='button'>Update</button>
                                    </form>
                                </div>
                                ";
                            
                        }
                    
            echo '</div>';

            } ?>




            <?php if($_SESSION['type'] == 'user'){ 


            $query = 'SELECT name, surname, email, username, streetName, streetNumber, zipcode, tusers.cityID, cityName FROM tusers INNER JOIN tcities WHERE userID = ? AND tcities.cityID = tusers.cityID';
            
            //prepare it
            $stmt = $db->prepare($query);

            // execute the prepared statement
            $ok = $stmt->execute([ $_SESSION['ID'] ]);


            $query2 = 'SELECT * FROM tcities';
            

            while($row = $stmt->fetch()){

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
                    <label>Username</label>
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

                            
                            //prepare it
                            $stmt = $db->prepare($query2);

                            // execute the prepared statement
                            $ok = $stmt->execute();

                            while($row2 = $stmt->fetch()) {

                                echo '<option value="'. $row2['cityID'] . '">' . $row2['cityName'] . '</option>';//sloppy use jquery 
            
                            }

                        echo "</select>
                        <button type='submit' class='button'>Update</button>
                    </form>
                </div>
                ";

            }


            }?>




        <div class="profile_buttons">
            <div class="button_profile BtnUpdateImage">Update Profile</div>
            <a class="delete_profile" href="APIs/api-delete-profile.php?ID=<?=$_SESSION['ID']?>"><div class="button_profile">Delete</div></a>
        </div>

</div>



<div id="dashboard">


<?php if($_SESSION['type'] == 'photographer') { ?>


<div class="dashboard_container">

    <div class="dashboard_box_large_start">
        <h3>Top 5 cities</h3>
        <hr>
        <div>

        <canvas id="myChart"></canvas>


        </div>
    </div>
    <div class="dashboard_box total_earned_wrapper">
        <h3>Total Money Earned</h3>
        <hr>
        <p class="totalMoneyErned"></p>
    </div>


    <div class="dashboard_box">
        <h3>Top 3 images</h3>
        <hr>
        <ol class="topFiveMostPopularImages">
        </ol>
    </div>

    <div class="dashboard_box_large_end">
       <h3>Orders</h3>
       <hr>
       <div class="orders_details_defination">
           <p>Pay.ID</p>
           <p>ID</p>
           <p>Date</p>
           <p>Price</p>
       </div>
       <div class="allOrdersWithNotDeletedImages"></div>
    </div>

</div>




<?php } ?>


<!-- <div class="dashboard_container">

<div class="dashboard_box">
    <h3>Most used card</h3>
    <hr>
    <div>
    Under construction
    </div>
</div>

<div class="dashboard_box_large_end">
    <h3>Newest orders</h3>
    <hr>
    <div>
    Under construction
    </div>
</div>

</div> -->




</div>



<?php $sLinkToScript = '<script src="js/update-profile.js"></script>'; if($_SESSION['type'] == 'photographer'){ $sLinkToScript2 = '<script src="js/dashboard.js"></script>';}; require_once(__DIR__ . '/footer.php'); ?>
