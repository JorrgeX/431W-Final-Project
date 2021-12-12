<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'yvh5398';
$password = 'a245125022';
$host = 'localhost';
$dbname = 'yvh5398_431W';

try {
    // select langauge from database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $language = 'SELECT `language` FROM `Language`';
    $q = $pdo->query($language);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    // select country from database
    // $pdo2 = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // $country = 'SELECT `country` FROM `Country`';
    // $q2 = $pdo2->query($country);
    // $q2->setFetchMode(PDO::FETCH_ASSOC);
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
            <h2>Search Sellers</h2>

            <!-- add Seller -->
            <form action="listSeller.php" method="POST">
                Rating(above)
                <select name='rating' required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                <br>
                Langauge
                <?php
                echo "<select name=\"language\" required>"; 
                // query language options from database
                while($row = $q->fetch()) {        
                    echo "<option value='" . $row['language'] . "'>" . $row['language'] . "</option>"; 
                }
                echo "</select>";
                ?>

                <br>
                <input type="submit" value="Search"></input>
            </form>
            
            <form action="seller.php" method="GET">
                <input type="submit" value="Add">
            </form>

            
            <br><br><br>
            <h2>Search Seller-Items</h2>

            <!-- add Item -->
            <form action="listItem.php" method="POST">

                <label for="sellerID">Seller ID:</label>   
                <input type="number" name="sellerID" required> 

                
                <!-- country  select -->
               

                <br>
                <label for="date">Month:</label>
                <select name='date' required>
                    <option value="1">12/2010</option>
                    <option value="2">1/2011</option>
                    <option value="3">2/2011</option>
                    <option value="4">3/2011</option>
                    <option value="5">4/2011</option>
                    <option value="6">5/2011</option>
                    <option value="7">6/2011</option>
                    <option value="8">7/2011</option>
                    <option value="9">8/2011</option>
                    <option value="10">9/2011</option>
                    <option value="11">10/2011</option>
                    <option value="12">11/2011</option>
                    <option value="13">12/2011</option>
                </select>

                <br>
                <input type="submit" value="Search"></input>
            </form>
            
            <form action="item.php" method="GET">
                <input type="submit" value="Add">
            </form>
            
            <br>
            <br><br><br>
        </div>
    </body>

</html>


<!-- <br>
<label for="country">Country</label>
<?php
echo "<select name=\"country\" required>"; 
// query country options from database
while($row = $q2->fetch()) {        
    echo "<option value='" . $row['country'] . "'>" . $row['country'] . "</option>"; 
}
echo "</select>";
?>   -->