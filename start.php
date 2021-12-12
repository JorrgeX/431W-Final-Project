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

                <input type="submit" value="Search"></input>
            </form>
            
            <form action="seller.php" method="GET">
                <input type="submit" value="Add">
            </form>

            
            <br><br><br>
            <h2>Search Items</h2>

            <!-- add Item -->
            <form action="listItem.php" method="POST">

                <label for="sellerID">Seller ID:</label>   
                <input type="number" name="sellerID"> 

                <label for="country">Country</label>
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

                <input type="submit" value="Search"></input>
            </form>
            
            <form action="seller.php" method="GET">
                <input type="submit" value="Add">
            </form>
            
            <br>
            <br><br><br>
        </div>
    </body>

</html>
