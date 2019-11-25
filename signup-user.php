<?php require_once(__DIR__ . '/header.php'); 
require_once(__DIR__ . '/includes/connection.php'); 

?>

    <h1>Signup User</h1>
    <form>
        <input name="tName" type="text" placeholder="Name">
        <input name="tSurname" type="text" placeholder="Surname">
        <input name="tEmail" type="text" placeholder="Email">
        <input name="tUsername" type="text" placeholder="Username">
        <input name="tPassword" type="text" placeholder="Password">
        <input name="tStreetName" type="text" placeholder="Street name">
        <input name="tStreetNumber" type="text" placeholder="Street number">
        <input name="tZipcode" type="text" placeholder="Zipcode">

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



    <?php $sLinkToScript = '<script src="js/signup-user.js"></script>'; require_once(__DIR__ . '/footer.php'); ?>

</body>
</html>

