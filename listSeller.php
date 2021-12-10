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
    // $seller = "SELECT `S.sellerID`, `S.fname`, `S.lname`, `R.rating`, `LA.language`, `LO.state` FROM `Seller S`, `Review R`, `Language LA`, `Location LO` WHERE LO.locationID=S.locationID and R.reviewID=S.reviewID and LA.languageID=S.languageID and R.rating>=$rating and LA.language=$language ";
    $seller = "SELECT `S.sellerID`, `S.fname`, `S.lname`, `R.rating`, `LA.language`, `LO.state` FROM `Seller S`, `Review R`, `Language LA`, `Location LO`";
    $q = $pdo->query($seller);
    if (!$q) {
        echo "\nPDO::errorInfo():\n";
        print_r($q->errorInfo());
    } else {    
        $q->setFetchMode(PDO::FETCH_ASSOC);
    }
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
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </body>

</html>
