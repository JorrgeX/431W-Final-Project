<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'yvh5398';
$password = 'a245125022';
$host = 'localhost';
$dbname = 'yvh5398_431W';

$rating = $_POST['rating'];
$language = $_POST['language'];



try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $seller = "SELECT Seller.sellerID, Seller.fname, Seller.lname, Review.rating, Language.language, Location.state FROM `Seller`, `Review`, `Language`, `Location` WHERE Location.locationID=Seller.locationID and Review.reviewID=Seller.reviewID and Language.languageID=Seller.languageID and Language.language='$language' and Review.rating>='$rating' ";
    $q = $pdo->query($seller);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} 
catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Simple E-Commerce Website</title>
    </head>
    <body>
        <div id="container">
            <h2>Sellers</h2>
            <table border=1 cellspacing=5 cellpadding=5>
                <thead>
                    <tr>
                        <th>Seller ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Rating</th>
                        <th>Language</th>
                        <th>State</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['sellerID']) ?></td>
                            <td><?php echo htmlspecialchars($row['fname']); ?></td>
                            <td><?php echo htmlspecialchars($row['lname']); ?></td>
                            <td><?php echo htmlspecialchars($row['rating']); ?></td>
                            <td><?php echo htmlspecialchars($row['language']); ?></td>
                            <td><?php echo htmlspecialchars($row['state']); ?></td>
                            <td><?php echo '<form action="/seller.php" method="POST"><input type="submit" value="UPDATE"><input type="hidden" name="sellerID" value="' . htmlspecialchars($row['sellerID']) . '"></form>'; ?></td>
                            <td><?php echo '<form action="/deleteSeller.php" method="POST"><input type="submit" value="DELETE"><input type="hidden" name="sellerID" value="' . htmlspecialchars($row['sellerID']) . '"></form>'; ?></td>
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
