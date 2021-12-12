<!-- listItem -->
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'yvh5398';
$password = 'a245125022';
$host = 'localhost';
$dbname = 'yvh5398_431W';

$sellerID = $_POST['sellerID'];
// $country = $_POST['country'];
$date =  $_POST['date'];


try {
    // check if seller in database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $seller = "SELECT * FROM `Seller` WHERE sellerID='$sellerID'";
    $q = $pdo->query($seller);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $valid = $q->fetchColumn() == 0;

    // query seller-item in database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $sellerItem = "SELECT Item.itemID, Item.description, Item.quantity, Date.month, Date.year, Country.country, Seller.sellerID, Seller.fname, Seller.lname, Review.rating, Language.language, Location.state FROM `Seller`, `SellerItem`, `Item`, `Country`, `Date`, `Review`, `Language`, `Location` WHERE Date.dateID=Item.dateID and Country.countryID=Item.countryID and Item.itemID=SellerItem.itemID and SellerItem.sellerID=Seller.sellerID and Seller.reviewID=Review.reviewID and Seller.languageID=Language.languageID and Seller.locationID=Location.locationID and Seller.sellerID='$sellerID' and Date.dateID='$date' ";
    $q2 = $pdo->query($sellerItem);
    $q3 = $pdo->query($sellerItem);
    $q2->setFetchMode(PDO::FETCH_ASSOC);
    $q3->setFetchMode(PDO::FETCH_ASSOC);
    $empty = $q3->fetchColumn() == 0;
} 
catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
<?php if ($valid): ?>
    <p>Invalid Seller ID.</p> 
    <p>You will be redirected in 3 seconds</p>
    <script>
        var timer = setTimeout(function() {
            window.location='start.php'
        }, 3000);
    </script>
<?php elseif ($empty): ?>
    <p>There are no Seller-Item under these conditions.</p>
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
        <div id="container">
            <h2>Seller-Items</h2>
            <table border=1 cellspacing=5 cellpadding=5>
                <thead>
                    <tr>
                        <th>Item ID</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Country</th>
                        <th>Seller ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Rating</th>
                        <th>Language</th>
                        <th>State</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q2->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['itemID']); ?></td>
                            <td><?php echo htmlspecialchars($row['description']) ?></td>
                            <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                            <td><?php echo htmlspecialchars($row['month']); ?></td>
                            <td><?php echo htmlspecialchars($row['year']); ?></td>
                            <td><?php echo htmlspecialchars($row['country']); ?></td>
                            <td><?php echo htmlspecialchars($row['sellerID']); ?></td>
                            <td><?php echo htmlspecialchars($row['fname']); ?></td>
                            <td><?php echo htmlspecialchars($row['lname']); ?></td>
                            <td><?php echo htmlspecialchars($row['rating']); ?></td>
                            <td><?php echo htmlspecialchars($row['language']); ?></td>
                            <td><?php echo htmlspecialchars($row['state']); ?></td>
                            <td><?php echo '<form action="/item.php" method="POST"><input type="submit" value="UPDATE"><input type="hidden" name="sellerID" value="' . htmlspecialchars($row['sellerID']) . '"></form>'; ?></td>
                            <td><?php echo '<form action="/deleteItem.php" method="POST"><input type="submit" value="DELETE"><input type="hidden" name="sellerID" value="' . htmlspecialchars($row['sellerID']) . '"><input type="hidden" name="itemID" value="' . htmlspecialchars($row['itemID']) . '"></form>'; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <form action="start.php" method="GET">
                <input type="submit" value="Back">
            </form>
        </div>
    </body>

</html>
<?php endif; ?>