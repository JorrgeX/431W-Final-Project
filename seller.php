<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'yvh5398';
$password = 'a245125022';
$host = 'localhost';
$dbname = 'yvh5398_431W';
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $sellerID = $_POST["sellerID"];
}

// if ($_SERVER['REQUEST_METHOD']==='POST') {
//     try {
//         $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//         $seller = "SELECT Seller.fname, Seller.lname, Review.rating, Language.language, Location.state FROM `Seller`, `Review`, `Language`, `Location` WHERE Location.locationID=Seller.locationID and Review.reviewID=Seller.reviewID and Language.languageID=Seller.languageID and Seller.sellerID='$sellerID' ";
//         $q = $pdo->query($seller);
//         $q->setFetchMode(PDO::FETCH_ASSOC);
//     } 
//     catch (PDOException $e) {
//         die("Could not connect to the database $dbname :" . $e->getMessage());
//     }
// }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Simple E-Commerce Website</title>
    </head>
    <body>
        <div id="container">
            <?php if ($_SERVER['REQUEST_METHOD']==='GET'): ?>
                <h2>Add Seller</h2>
            <?php elseif ($_SERVER['REQUEST_METHOD']==='POST'): ?>
                <h2>Update Seller: <?php echo $sellerID ?></h2>
            <?php endif; ?>

            <?php if ($_SERVER['REQUEST_METHOD']==='GET'): ?>
                <form action="addSeller.php"  method="POST">
            <?php elseif ($_SERVER['REQUEST_METHOD']==='POST'): ?>
                <form action="updateSeller.php"  method="POST">
            <?php endif; ?>
                    <label for="fname">First name:</label>
                    <input type="text" name="fname" id="fname">

                    <br>
                    <label for="lname">Last name:</label>
                    <input type="text" name="lname" id="lname">       

                    <br>
                    <label for="location">Location:</label>
                    <select name='location'>
                        <option disabled selected>--Select location--</option>
                        <option value="1">PA</option>
                        <option value="2">NY</option>
                        <option value="3">CA</option>
                        <option value="4">WA</option>
                        <option value="5">GA</option>
                        <option value="6">IL</option>
                        <option value="7">FL</option>
                        <option value="8">OK</option>
                        <option value="9">AK</option>
                        <option value="10">TX</option>
                    </select>

                    <br>
                    <label for="language">Language:</label>
                    <select name='language'>
                        <option disabled selected>--Select language--</option>
                        <option value="1">English</option>
                        <option value="2">Spanish</option>
                        <option value="3">Mandarin</option>
                        <option value="4">German</option>
                        <option value="5">French</option>
                        <option value="6">Russian</option>
                        <option value="7">Korean</option>
                        <option value="8">Japanese</option>
                        <option value="9">Hindi</option>
                        <option value="10">Arabic</option>
                    </select>

                    <br>
                    <label for="rating">Rating:</label>
                    <select name='rating'>
                        <option disabled selected>--Select rating--</option>
                        <option value="1">1.3</option>
                        <option value="2">1.5</option>
                        <option value="3">2.3</option>
                        <option value="4">2.9</option>
                        <option value="6">3.4</option>
                        <option value="5">3.8</option>
                        <option value="10">3.9</option>
                        <option value="8">4.3</option>
                        <option value="9">4.4</option>
                        <option value="7">4.8</option>
                    </select>

                    <?php if ($_SERVER['REQUEST_METHOD']==='POST'): ?>
                        <?php echo '<input type="hidden" name="sellerID" value="'.$sellerID.'">' ?>
                    <?php endif; ?>

                    <br>
                    <input type="submit" value="Submit">
                </form>

            <form action="start.php" method="GET">
                <input type="submit" value="Back">
            </form>
        </div>
    </body>

</html>