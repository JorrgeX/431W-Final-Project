<?php

ini_set("display_errors", 1);
ini_set("display_start_errors", 1);
error_reporting(E_ALL);

$username = 'yvh5398';
$password = 'a245125022';
$host = 'localhost';
$dbname = 'yvh5398_431W';

$sellerID = $_POST['sellerID'];
$itemID = $_POST['itemID'];

try {
    // check if seller in database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $seller = "SELECT * FROM `Seller` WHERE sellerID='$sellerID'";
    $q = $pdo->query($seller);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $valid = $q->fetchColumn() == 0;

    // check if item in database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $item = "SELECT * FROM `Item` WHERE itemID='$itemID'";
    $q2 = $pdo->query($item);
    $q2->setFetchMode(PDO::FETCH_ASSOC);
    $valid2 = $q2->fetchColumn() == 0;
} 
catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>

<?php if ($valid || $valid2): ?>
    <p>Invalid SellerID or ItemID.</p> 
    <p>You will be redirected in 3 seconds</p>
    <script>
        var timer = setTimeout(function() {
            window.location='start.php'
        }, 3000);
    </script>
<?php else: ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Simple E-Commerce Website</title>
    </head>
    <body>
        <p>
            <?php
                echo "Inserting new Seller-Item: " . $sellerID . " " . $itemID . "...";
                $sql = "INSERT INTO SellerItem (sellerID, itemID) VALUES ('$sellerID', '$itemID')";
                try {
                    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $conn ->exec($sql);
                    echo "<br>";
                    echo "New Seller-Item created successfully"; 
            ?>
                <p>You will be redirected in 3 seconds</p>
                <script>
                    var timer = setTimeout(function(){
                        window.location="start.php"
                    }, 3000);
                </script>
            <?php
                }
                catch(PDOException $e){
                    echo $sql . "<br>" . $e->getMessage();
                }
                $conn = null;
            ?>
        </p>
    </body>
</div>
</html>
<?php endif; ?>