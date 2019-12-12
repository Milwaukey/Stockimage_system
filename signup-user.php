<?php require_once(__DIR__ . '/header.php'); 
require_once(__DIR__ . '/includes/connection.php'); 

// session_start();
if($_SESSION){

    header('Location: profile.php ');

}

?>

<div class="signup_form_container">

    <h1>Signup User</h1>
    <form>
        <div class="input_wrapper">
            <label>Name</label>
            <input class="effect-1" name="tName" type="text" placeholder="Name">
            <span class="focus-border"></span>
        </div>
        <div class="input_wrapper">
            <label>Surname</label>
            <input class="effect-1" name="tSurname" type="text" placeholder="Surname">
            <span class="focus-border"></span>
        </div>
        
        <div class="input_wrapper">
            <label>Email</label>
            <input class="effect-1" name="tEmail" type="text" placeholder="Email">
            <span class="focus-border"></span>
        </div>

        <div class="input_wrapper">
            <label>Username</label>
            <input class="effect-1" name="tUsername" type="text" placeholder="Username">
            <span class="focus-border"></span>
        </div>

        <div class="input_wrapper">
            <label>Password</label>
            <input class="effect-1" name="tPassword" type="text" placeholder="Password">
            <span class="focus-border"></span>
        </div>

        <div class="wrapper_form">
        <div class="input_wrapper">
            <label>Streetname</label>
            <input class="effect-1" name="tStreetName" type="text" placeholder="Street name">
            <span class="focus-border"></span>
        </div>
        <div class="input_wrapper">
            <label>Streetnumber</label>
            <input class="effect-1" name="tStreetNumber" type="text" placeholder="Street number">
            <span class="focus-border"></span>
        </div>
        </div>

        <div class="input_wrapper">
            <label>Zipcode</label>
            <input class="effect-1" name="tZipcode" type="text" placeholder="Zipcode">
            <span class="focus-border"></span>
        </div>

        <select name="tCity">
            <option disabled selected >CHOOSE CITY</option>
            <?php
                $query = 'SELECT * FROM tcities';
                $results = mysqli_query($db, $query);

                while($row = mysqli_fetch_array($results)) {

                    echo '<option value="'. $row['cityID'] . '">' . $row['cityName'] . '</option>';//sloppy use jquery 

                }

            ?>
        </select>

        <button id="BtnSignup">Signup</button>
    </form>

            </div>

    <?php $sLinkToScript = '<script src="js/signup-user.js"></script>'; require_once(__DIR__ . '/footer.php'); ?>

</body>
</html>

