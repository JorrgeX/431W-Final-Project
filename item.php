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
                <h2>Add Seller-Item</h2>
            <?php elseif ($_SERVER['REQUEST_METHOD']==='POST'): ?>
                <h2>Update Seller <?php echo $sellerID ?>'s Item</h2>
            <?php endif; ?>

            <?php if ($_SERVER['REQUEST_METHOD']==='GET'): ?>
                <form action="addItem.php"  method="POST">
            <?php elseif ($_SERVER['REQUEST_METHOD']==='POST'): ?>
                <form action="updateItem.php"  method="POST">
            <?php endif; ?>
                    <?php if ($_SERVER['REQUEST_METHOD']!=='POST'): ?>
                        <label for="sellerID">Seller ID:</label>
                        <input type="number" name="sellerID" required>
                        <br>
                    <?php endif; ?>


                    <label for="itemID">Item ID:</label>
                    <input type="number" name="itemID" required>

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